/**
 * User: FKurilov
 * Date: 08.06.12
 */
define(function(require) {
    //var InstDiagnostic = require('models/diagnostics/instrumental-diag');
    var Consultation = Model.extend({
        idAttribute: 'id'

    });

    return Collection.extend({
        model: Consultation,

        url: function() {
            return DATA_PATH + "appeals/" + this.appealId + "/diagnostics/consultations/";
        }
    });
});
