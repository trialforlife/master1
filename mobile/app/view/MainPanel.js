Ext.define("SenchaNote.view.MainPanel", {
	extend: "Ext.tab.Panel",
	xtype: "mainpanel",

	config: {
		tabBarPosition: "bottom",
		items: [ {xtype: "notelistcontainer"} , { xtype: "aboutpanel"} ]
	}
});