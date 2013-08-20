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

        var favStore = Ext.create("Ext.data.Store", {
        model: "Favorite",
        storeId: 'Favorite',
        proxy: {
        type: "sql"
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

                                                                            //var s_type = record.get('code');
                                                                            //var c_content = post.get('filmpage');
                                                                            //alert('РаботаетЬ');

                                                                            /*favStore.add([{
                                                                                name: s_name,
                                                                                ftype: cat,
                                                                                image: s_image,
                                                                                link: '',
                                                                                res : '',
                                                                                fid : cfid,

                                                                            }]);
                                                                            favStore.sync();*/

                                                                            /*function prepareDatabase(ready, error) {
                                                                              return openDatabase('Sencha', '1.0', 'Sencha', 5*1024*1024, function (db) {
                                                                                db.changeVersion('', '1.0', function (t) {
                                                                                  t.executeSql('CREATE TABLE Favorite (id, name,ftype,image,link,res,fid)');
                                                                                }, error);
                                                                              });
                                                                            }

                                                                            function showDocCount(db, span) {
                                                                              db.readTransaction(function (t) {
                                                                                t.executeSql('SELECT COUNT(*) AS c FROM Favorite', [], function (t, r) {
                                                                                  span.textContent = r.rows[0].c;alert('e.message');
                                                                                }, function (t, e) {
                                                                                  // couldn't read database
                                                                                  span.textContent = '(unknown: ' + e.message + ')';alert('es.message');
                                                                                });
                                                                              });
                                                                            }

                                                                            prepareDatabase(function(db) {
                                                                              // got database
                                                                              var span = document.getElementsByTagName('body');alert('message');
                                                                              showDocCount(db, span);
                                                                            }, function (e) {
                                                                              // error getting database
                                                                              alert(e.message);
                                                                            });*/
                                                                            favStore.sync();

                                                                            db = openDatabase("Sencha", "1.0", "Sencha", 200000);
                                                                                if(!db)
                                                                                    {alert("Failed to connect to database.");}   
                                                                                else 
                                                                                    {//alert('fuck yeah');
                                                                            }
                                    
                                                                            
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
                                                                                    favStore.add([{
                                                                                        name: s_name,
                                                                                        ftype: cat,
                                                                                        image: s_image,
                                                                                        link: '',
                                                                                        res : '',
                                                                                        fid : cfid,

                                                                                    }]);
                                                                                    favStore.sync();
                                                                                }

                                                                                });
                                                                                
                                                                               


                                                                            /*
                                                                            tx.executeSql("SELECT id FROM Favorite WhERE fid = ? ", [cfid], function(tx, data){
                                                                                //lel = result.rows.length;
                                                                               

                                                                                
                                                                                console.log(d);

                                                                            }                   ,
                                                                            function (tx, error) {
                                                                                console.log(error);
                                                                             }

                                                                                )*/
                                                                        });
                                                                            
                                                                                
                                                         
        


                                                                            /*db.transaction(function(tx1) {
                                                                            tx1.executeSql("DELETE FROM Favorite WhERE fid = ? ", [cfid], function(result1){
                                                                                //console.log(result.rows['1']);
                                                                                //alert(result.length);
                                                                                //f = console.log(result.rows.length);
                                                                                var ft = result1.rows;
                                                                                    if(ft == undefined){               
                                                                                        alert('ol');      
                                                                                         }
                                                                                  
                                                                                }
                                                                                //function(tx, error){}
                                                                                );                                                                            
                                                                            });*/

                                                                            
                                                                            

                                                                            //console.log(Ext.getStore('Favorite').getAt(index));
                                                                            //Ext.getStore('Favorite').sync();
                                                                            //Ext.getStore('Favorite').sync();

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


        

