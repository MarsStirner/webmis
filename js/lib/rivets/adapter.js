define(function(require){
	var rivets = require('rivetsLib');
     var Model = Backbone.Model,
        Collection = Backbone.Collection;

    /**
     * Resolves path chain
     *
     * for a, 'b.c.d' returns {model: a.b.c, key:'d'}
     *
     * @param {Model}  model
     * @param {String} keypath
     *
     * @returns {{model: Model, key: String}}
     */
    function getKeyPathRoot(model, keypath) {
        keypath = keypath.split('.');

        while (keypath.length > 1) {
            model = model.get(keypath.shift());
        }

        return {
            model: model,
            key: keypath.shift()
        };
    }

    /**
     * @param {Model}  model
     * @param {String} keypath
     * @param {*}      [value]
     *
     * @returns {*}
     */
    function getterSetter(model, keypath, value) {
        var root = getKeyPathRoot(model, keypath);
        model = root.model;

        if (!(model instanceof Model)) {
            return model;
        }

        if (arguments.length === 2) {
            return model.get(root.key);
        }

        model.set(root.key, value);
    }

    /**
     * @param {String} action on or off
     * @returns {Function}
     */
    function onOffFactory(action) {

        /**
         * @param {Model}    model
         * @param {String}   keypath
         * @param {Function} callback
         */
        return function (model, keypath, callback) {
            if (!(model instanceof Model)) {
                return;
            }

            var root = getKeyPathRoot(model, keypath),
                collection = root.model.get(root.key);

            if (collection instanceof Collection) {
                collection[action]('add remove reset', callback);
            } else {
                root.model[action]('change:' + root.key, callback);
            }
        };
    }

    /**
     * @param {Model|Collection} obj
     * @param {String}           keypath
     * @returns {*}
     */
    function read(obj, keypath) {
        if (obj instanceof Collection) {
            return obj[keypath];
        }

        var value = getterSetter(obj, keypath);

        // rivets cant iterate over Backbone.Collection -> return Array
        if (value instanceof Collection) {
            return value.models;
        }

        return value;
    }

    /**
     * @param {Model|Collection} obj
     * @param {String}           keypath
     * @param {*}                value
     */
    function publish(obj, keypath, value) {
        if (obj instanceof Collection) {
            obj[keypath] = value;
        } else {
            getterSetter(obj, keypath, value);
        }
    }

    // Configure rivets data-bind for Backbone.js
    rivets.configure({
        adapter: {
            subscribe: onOffFactory('on'),
            unsubscribe: onOffFactory('off'),
            read: read,
            publish: publish
        }
    });
    
    return rivets;

});
