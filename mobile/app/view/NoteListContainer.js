Ext.define("SenchaNote.view.NoteListContainer",{
	extend: "Ext.Panel",
	xtype: "notelistcontainer",
	name: 'Sencha',

	requires: ["SenchaNote.view.NoteList","SenchaNote.view.SearchBar","Ext.tab.Panel"],

	/*initialize: function() {
		/*var toolbar = {
			xtype: "toolbar",
			docked: "top",
			title: "Now-Yakutsk",
			items: [
				{ xtype: "spacer" },
				{
					xtype: "button",
					text: "Add",
					handler: this.onAddNoteTap,
					scope: this
				}
			]
		};*/
		/*var toolbar = {
			xtype: "toolbar",
			docked: "top",
			title: "Now-Yakutsk1",
			items: [
				{
					xtype: "button",
					ui: "back",
					text: "Back", 
					handler: this.onBackTap,
					scope: this
				},
				{ xtype: "spacer" },
				{
					xtype: "button",
					ui: "confirm",
					text: "Save",
					handler: this.onSaveTap,
					scope: this
				}
			]
		};

		this.add([
			toolbar,
			{
				xtype: "fieldset",
				defaults: {
					xtype: "textfield"
				},
				items: [
					{ //name: "content", label: "Content" 
				},
					{ 
					name: "categoryid", label: "Кино", 
					xtype: "selectfield", store: "Category", 
					displayField: "name", 
					valueField: "id" 
				},

					{ name: "categoryid", label: "Кино", xtype: "selectfield", store: "Category", displayField: "name", valueField: "id" }
				]
			}
		]);

		//this.add([toolbar, { xtype: "searchbar" }, { xtype: "notelist"}]);
	},

	config: {
		layout: "fit", //critical for list to show
		title: "Note List",
		iconCls: "home"
	},

	onAddNoteTap: function() {
		this.fireEvent("addNoteCommand",this);
	},*/
	initialize: function() {
        Ext.create("Ext.tab.Panel", {
            fullscreen: true,
            tabBarPosition: 'bottom',

            items: [
                {
                    xtype: 'nestedlist',
                    title: 'Blog',
                    iconCls: 'star',
                    displayField: 'name',

                    store: {
                        type: 'tree',

                        fields: [
                            'name', 'adress', 'image', 'name', 'id',
                            {name: 'leaf', defaultValue: true}
                        ],

                        root: {
                            leaf: false
                        },

                        proxy: {
                            type: 'jsonp',
                            url: 'http://now/cinemalist.php',
                            reader: {
                                type: 'json',
                                rootProperty: 'cinema'
                            }
                        }
                    },

                    detailCard: {
                        xtype: 'panel',
                        scrollable: true,
                        styleHtmlContent: true
                    },

                    listeners: {
                        itemtap: function(nestedList, list, index, element, post) {
                            this.getDetailCard().setHtml(post.get('adress'));
                            //this.getDetailCard().html('Welcome');
                           }
                    }
                }
            ]
        });
    }
});