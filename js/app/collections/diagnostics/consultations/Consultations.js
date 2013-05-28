/**
 * User: FKurilov
 * Date: 08.06.12
 */
define(function(require) {
    //var InstDiagnostic = require('models/diagnostics/instrumental-diag');

    return Collection.extend({
        //model: InstDiagnostic,

        url: function() {
            return DATA_PATH + "appeals/" + this.appealId + "/diagnostics/consultations/";
        }
    });
});
