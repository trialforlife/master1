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
        Ext.require(['Ext.data.proxy.SQL']);
            Ext.define("Favorite", {
            extend: "Ext.data.Model",
            config: {
            fields: ["id","name","ftype","image","link","res", "fid"]
            }
        });

        Ext.create("Ext.data.Store", {
            model: "Favorite",
            storeId: 'Favorite',
            proxy: {
            type: "sql"
            }
        });


        db = openDatabase("Sencha", "1.0", "Sencha", 200000);
            if(!db)
                {alert("Failed to connect to database.");}   
            else 
                {//alert('fuck yeah');
        }


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
                url: 'http://now-yakutsk.stairwaysoft.net/catlist.php',
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

                        var faveritelist  = Ext.create("Ext.NestedList", {
                            fullscreen: true,
                            tabBarPosition: 'bottom',

                        //useToolbar:false,
                                //title: 'Blog',
                                iconCls: 'star',
                                displayField: 'filmpage',
                                store: {
                                    type: 'tree',
             
                                    fields: [
                                        'html','code',
                                        {name: 'leaf', defaultValue: true}
                                    ],
                                    root: {
                                        leaf: false
                                    },
                            detailCard: {
                                xtype: 'panel',
                                scrollable: true,
                                styleHtmlContent: true
                            },
                        },
                        listeners: {
                             activate : function() { 


                                tb1 = this.getToolbar();
                                tb1.hide();
                                tb.show(); 

                                        var favoritecard =  db.transaction(function(tx) {

                                        tx.executeSql('SELECT * FROM Favorite ', [] , function (tx, results) {
                                          lens = results.rows.length;
                                          ftyp = results.rows.item(0).ftype;
                                          console.log(ftyp);
                                          console.log(lens);
                                          str1= '';
                                          for (var i=0; i<= lens; i++)
                                          {     
                                                //alert(results.rows.item(i).name);
                                                  str1 = str1+ "<br>Row = " + i +" ID = "+ results.rows.item(i).fid +" <br>type = " +results.rows.item(i).ftype+" <br>name = " + results.rows.item(i).name;
                                                                                            nestedList.getDetailCard().el.setHtml(str1);


                                                    

                                          }console.log(str1); nestedList.getDetailCard().el.setHtml(str1);
                                          if (lens  > 0 ) {
                                            //alert("bolshe");
                                            //tx.executeSql("DELETE FROM Favorite WhERE fid = ? ", [cfid], function(result1){                               });
                                        }
                                        else{
                                            alert('It empty');
                                            
                                        }

                                        },
                                        function (tx, error)
                                        {
                                            alert('It empty');

                                        }
                                        )}
                           
);                        
                          
                            //nestedList.getDetailCard().insertHtml("VOYVOY");


                            //this.getToolbar().hide();
                             } ,
                             deactivate: function() {       
                                //tb.show(); 
                                //alert('dd');
                            //this.getToolbar().hide();                           
                            }
                        }


                        });


                        


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
                                url: 'http://now-yakutsk.stairwaysoft.net/catlist2.php',
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
                                                    url: 'http://now-yakutsk.stairwaysoft.net/cinemalist.php',
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
                                                fid = post.get('cid');
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
                                                                url: 'http://now-yakutsk.stairwaysoft.net/filmlist.php?f_cid='+f_cid,
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
                                                                            var s_name = post.get('list');
                                                                            var s_image = post.get('image');
                                                                            cfid = post.get('cid');
                                                                            //adding to favorite

                                                                            db.transaction(function(tx) {
                                                                                tx.executeSql('SELECT * FROM Favorite WhERE fid = ?', [cfid] , function (tx, results) {
                                                                                  len = results.rows.length;
                                                                                  console.log(len);
                                                                                  if (len  > 0 ) {
                                                                                    alert("bolshe");
                                                                                    tx.executeSql("DELETE FROM Favorite WhERE fid = ? ", [cfid], function(result1){

                                                                                    });
                                                                                }
                                                                                else{
                                                                                    alert('inS');
                                                                                    Ext.getStore("Favorite").add([{
                                                                                        name: s_name,
                                                                                        ftype: cat,
                                                                                        image: s_image,
                                                                                        link: '',
                                                                                        res : '',
                                                                                        fid : cfid,

                                                                                    }]);
                                                                                    Ext.getStore("Favorite").sync();
                                                                                }

                                                                                },
                                                                                function (tx, error)
                                                                                {
                                                                                Ext.getStore("Favorite").add([{
                                                                                        name: s_name,
                                                                                        ftype: cat,
                                                                                        image: s_image,
                                                                                        link: '',
                                                                                        res : '',
                                                                                        fid : cfid,

                                                                                    }]);
                                                                                    Ext.getStore("Favorite").sync();
                                                                                }
                                                                                )});
                                                                                
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
                                                                nestedList.getDetailCard().setHtml('Got it');
                                                                //this.getDetailCard().setHtml(post.get('banner'));
                                                            }
                                                        }
                                            });     
                                                var detailCard = nestedList.getDetailCard();
                                                    nestedList.setDetailCard(fil);
                                                }
                                            }
                                });
                                        
                                        var cat = (record.get('code'));
                                        switch (cat) {
                                           case "cinema":
                                              //alert(cat);
                                               var detailCard = nestedList.getDetailCard();
                                               nestedList.setDetailCard(cin);
                                               break;
                                           case "theatre":
                                                    nestedList.setDetailCard(theatre);
                                                break;
                                           case "events":
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
                                        }                                            
                                    }                                 
                                });
                                        

                                var code = (record.get('code'));
                                switch (code) {
                                    case "poster":
                                        var detailCard = nestedList.getDetailCard();
                                        nestedList.setDetailCard(treeStore2);
                                        break;
                                    case "favorite":
                                        var detailCard = nestedList.getDetailCard();//nestedList.getDetailCard().setHtml('<div>HI</div>');
                                            
                                            nestedList.setDetailCard(faveritelist);
         
                                                                        

                                        break;   
                                    case labelN:
                                           default:
                                           break;
                                    }                               //Ext.viewPort.setActiveItem('treeStore2');    
                                        //this.getToolbar().hide();
                                } 
                        } 
            });


        

