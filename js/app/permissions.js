define(function(){
    var permissions = [];
    var userRole = Core.Data.currentRole();

    switch(userRole){
        case 'strNurse':
        case 'admNurse':
            permissions = ['see_patient_card', 'see_patient_appeals'];
        break;
        default:
            permissions = ['see_patient_card', 'see_patient_appeals', 'see_patient_summary'];
        break;
    }



    return permissions;
});
