
Ext.define("SenchaNote.store.Note", {
	extend: "Ext.data.Store",
	requires: ["SenchaNote.model.Note"],
	config: {
		model: "SenchaNote.model.Note", //need full name, weird
		proxy: {
			type: "ajax",
			api: {
				create: "http://SenchaNote/Note.php?action=create",
				read: "http://SenchaNote/Note.php",
				update: "http://SenchaNote/Note.php?action=update",
				destroy: "http://SenchaNote/Note.php?action=delete"
			},
			extraParams: {
				keyword: ""
			},
			reader: {
				type: "json",
				rootProperty: "notes",
				totalProperty: "total"
			}
		},
		pageSize: 1,
		autoLoad: true
	}
});