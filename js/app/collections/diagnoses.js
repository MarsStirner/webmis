define( ["models/diagnosis"], function (){
	App.Collections.Diagnoses = Collection.extend({
		model: App.Models.Diagnosis,
		getAssignments: function ()
		{
			return this.filter( function ( model )
			{
				return ( model.get( "diagnosisKind" ) == "assignment" )
			} )
		},
		getAftereffects: function ()
		{
			return this.filter( function ( model )
			{
				return ( model.get( "diagnosisKind" ) == "aftereffect" )
			} )
		},
		getAttendants: function ()
		{
			return this.filter( function ( model )
			{
				return ( model.get( "diagnosisKind" ) == "attendant" )
			} )
		}
	})
} );