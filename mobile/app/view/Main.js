Ext.define('ListItem', {

    extend: 'Ext.data.Model',
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
                        /*dockedItems: [
                                            {
                                                xtype: 'toolbar',
                                                dock: 'top',
                                                items: [
                                                    {
                                                        text: 'Back',
                                                        ui: 'back',
                                                        handler: function(){ 
                                                            //Ext.getCmp('mainPanel').setActiveItem(0);
                                                             //Ext.getCmp('mainPanel').setActiveItem(0);
                                                        }
                                                    }
                                                ]
                                            }
                                        ],*/

                       /* getDetailCard: function (item, parent)
                        {var itemData = cat.attributes.record.data,
                            parentData = parent.attributes.record.data,
                            detailCard = new Ext.Panel({ 
                                        xtype: 'panel',
                                        scrollable: true,
                                        styleHtmlContent: true,
                                         })
                            detailCard.update(itemData);
                            this.backButton.setText(parentData.text);
                            return detailCard;
                        },*/

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
                                                    'name', 'link', 'list', 'image', 'adress', 'banner',
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
                                                    this.getDetailCard().setHtml(post.get('banner'));
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
                                           case "Театры":
                                                //alert(cat);
                                                nestedList.setDetailCard(theatre);
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
                                    default: 
                                        alert("Pals");
                                        nestedList.setDetailCard(treeStoreS2);

                                        break;
                                    }                               //Ext.viewPort.setActiveItem('treeStore2');    
                                        //this.getToolbar().hide();

                                }
 
                        }
 
            });


        

