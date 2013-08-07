Ext.define("SenchaNote.store.Category",{
	extend: "Ext.data.Store",

	requires: ["SenchaNote.model.Category"],

	config: {
		model: "SenchaNote.model.Category",
		proxy: {
			type: "ajax",
			url: "http://now/cinemalist.php",
			reader: {
				type: "json",
				rootProperty: "cinema"
			}
		},
		autoLoad: true
	}
});