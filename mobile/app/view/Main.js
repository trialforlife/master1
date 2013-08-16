Ext.define('ListItem', {

    extend: 'Ext.data.Model',
    require: ["Ext.data.proxy.SQL"],
    config: {
        fields: ['text'],
    },
    initialize: function() {
          this.callParent(arguments);// required to make back button work
    }

});


    var treeStore = Ext.create("Ext.NestedList", {
        fullscreen: true,
        tabBarPosition: 'bottom',
        useToolbar:true,
        id: 'mainPanel',                  
        title: 'Now-Yakutsk',
        iconCls: 'star',
        displayField: 'title',
        layout: 'card',

        store: {
            type: 'tree',
            id: 'ListCard',
            fields: [
                'title','code',
                {name: 'leaf', defaultValue: true}
            ],

            root: {
                leaf: false,

            },

            proxy: {
                type: 'jsonp',
                url: 'http://now/catlist.php',
                reader: {
                    type: 'json',
                    rootProperty: 'cat',
                }
            }
        },                                                                      

        listeners: {  activate : function() { 
                            //this.getToolbar().hide();
                            tb = this.getToolbar();
                            
                             } ,
                             deactivate: function() {
                            //this.getToolbar().hide();                          
                            }
                            ,                       
                    leafitemtap: function(nestedList, list, index, target, record) {
                        //this.getToolbar().hide();  
                        //favorite                              
                       

                        //subreee
                        var treeStore2 = Ext.create("Ext.NestedList", {

                        fullscreen: true,
                        tabBarPosition: 'bottom',
                        //useToolbar:false,

                            //leaf: true ,
                            iconCls: 'star',
                            displayField: 'title',


                        store: {
                            type: 'tree',
                            fields: [
                                'title','code','link',
                                {name: 'leaf', defaultValue: true}
                            ],

                            root: {
                                leaf: false
                            },

                            proxy: {
                                type: 'jsonp',
                                url: 'http://now/catlist2.php',
                                reader: {
                                    type: 'json',
                                    rootProperty: 'cat'
                                }
                            }
                        },


                        listeners: {
                             activate : function() {         
                                tb1 = this.getToolbar();
                                tb1.hide();
                                tb.show(); 
                            //this.getToolbar().hide();
                             } ,
                             deactivate: function() {       
                                //tb.show(); 
                                //alert('dd');
                            //this.getToolbar().hide();                           
                            }
                            ,
                            leafitemtap: function(nestedList, list, index, target, record) {
                                var cin = Ext.create("Ext.NestedList", {
                                    fullscreen: true,
                                    tabBarPosition: 'bottom',
                                    //useToolbar:false,
                                            //title: 'Blog',
                                            iconCls: 'star',
                                            displayField: 'list',
                         
                                            store: {
                                                type: 'tree',
                         
                                                fields: [
                                                    'name', 'link', 'list', 'image', 'adress', 'banner','cid',
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
                                            activate : function() {     
                                                tb1.show();
                                                tb2 = this.getToolbar();
                                                tb2.hide();
                                                tb.hide(); 
                                            //this.getToolbar(treeStore2).hide();
                                             } ,
                                             deactivate: function() {
                                                tb.show();                             
                                                tb1.hide();
                                                //this.getToolbar().hide();
                    }
                                            ,
                                                leafitemtap: function(nestedList, list, index, element, post) {
                                                var f_cid = post.get('cid');
                                                var c_nam = post.get('name');
                                                //alert(tqt);
                                                var fil = Ext.create("Ext.NestedList", {

                                                fullscreen: true,
                                                tabBarPosition: 'bottom',

                                                //useToolbar:false,
                                                        //title: 'Blog',
                                                        iconCls: 'star',
                                                        displayField: 'filmpage',
                                                        store: {
                                                            type: 'tree',
                                     
                                                            fields: [
                                                                'name','image','id','filmpage',
                                                                {name: 'leaf', defaultValue: true}
                                                            ],
                                                            root: {
                                                                leaf: false
                                                            },
                                                            proxy: {
                                                                type: 'jsonp',
                                                                url: 'http://now/filmlist.php?f_cid='+f_cid,
                                                                reader: {
                                                                    type: 'json',
                                                                    rootProperty: 'films',
                                                                }
                                                            }
                                                        }, 
                                                        dockedItems: [
                                                            {
                                                                xtype: 'toolbar',
                                                                dock: 'top',
                                                                items: [
                                                                    {   
                                                                        
                                                                        text: '+',
                                                                        ui: 'decline',
                                                                        handler: function(){ 
                                                                            var c_nam1 = post.get('list');
                                                                            //var c_content = post.get('filmpage');
                                                                            //alert('РаботаетЬ');

                                                                            Ext.require(['Ext.data.proxy.SQL']);
                                                                            Ext.define("Favorite", {
                                                                                extend: "Ext.data.Model",
                                                                                config: {
                                                                                fields: ["name","phone",]
                                                                            }
                                                                            });

                                                                            Ext.create("Ext.data.Store", {
                                                                            model: "Favorite",
                                                                                storeId: 'Users',
                                                                                proxy: {
                                                                                type: "sql"
                                                                                }
                                                                            });

                                                                            Ext.getStore('Users').add([{
                                                                                name: c_nam,
                                                                                phone: c_nam1,
                                                                            }]);

                                                                            Ext.getStore('Users').sync();
                                                                            
                                                                            Ext.getStore("Users").getModel('Users').getProxy().dropTable('Users');
                                                                            }
                                                                    }
                                                                ]
                                                            }
                                                        ],                                         
                                                        detailCard: {
                                                            xtype: 'panel',
                                                            scrollable: true,
                                                            styleHtmlContent: true
                                                        },
                                                        listeners: {
                                                        activate : function() {     
                                                                tb1.hide();
                                                                tb2.show();
                                                                tb3 = this.getToolbar();
                                                                tb3.hide();
                                                                tb.hide(); 
                                                        //this.getToolbar(treeStore2).hide();
                                                         } ,
                                                         deactivate: function() {
                                                            //tb.show();                             
                                                            tb1.show();
                                                            tb2.hide();
                                                            //this.getToolbar().hide();
                                                            }
                                                        ,
                                                            leafitemtap: function(nestedList, list, index, element, post) {
                                                                
                                                                alert("wow");
                                                                //this.getDetailCard().setHtml(post.get('banner'));
                                                            }
                                                        }
                                            });     
                                                var detailCard = nestedList.getDetailCard();
                                                    nestedList.setDetailCard(fil);
                                                }
                                            }
                                });
                                        var detailCard = nestedList.getDetailCard();
                                        var cat = (record.get('code'));
                                        switch (cat) {
                                           case "cinema":
                                              //alert(cat);
                                               nestedList.setDetailCard(cin);
                                               break;
                                           case "favorite":
                                                break;
                                           case "Городские мероприятия":
                                                //alert(cat);
                                                nestedList.setDetailCard(events);
                                                break;
                                           case "Театры":
                                                //alert(cat);
                                                break;
                                           case "Театры":
                                                //alert(cat);
                                                break;
                                           case labelN:
                                           default:
                                           break;
                                        };
                                        //detailCard.setHtml('You selected: '  + record.get('text'));
                                                           }                                            
                                            }                                 
                                });
                                var code = (record.get('code'));
                                switch (code) {
                                    case "poster":
                                        //alert(cat);
                                        nestedList.setDetailCard(treeStore2);
                                        break;
                                    case "favorite":
                                        nestedList.setDetailCard(us);
                                        break;   
                                    default: 
                                        alert("Pals");
                                        //nestedList.setDetailCard(treeStoreS2);
                                        break;
                                    }                               //Ext.viewPort.setActiveItem('treeStore2');    
                                        //this.getToolbar().hide();
                                } 
                        } 
            });


        

