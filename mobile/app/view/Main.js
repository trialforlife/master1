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
        db = openDatabase("Sencha", "1.0", "Sencha", 200000);
            if(!db)
                {alert("Failed to connect to database.");}   
            else 
                {//alert('fuck yeah');
        };
        Ext.require(['Ext.data.proxy.SQL']);
            Ext.define("Favorite", {
            extend: "Ext.data.Model",
            config: {
            fields: ["id","name","ftype","image","link","res", "fid"]
            }
        });

        var favestore = Ext.create("Ext.data.Store", {
            model: "Favorite",defaultRootProperty: 'items',
            storeId: 'Favorite',
            proxy: {
                type: "sql"
            },
            autoLoad: true
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
                        var favestore = Ext.create("Ext.data.Store", {
                        model: "Favorite",defaultRootProperty: 'items',
                        storeId: 'Favorite',
                        proxy: {
                            type: "sql"
                        },
                        autoLoad: true
                             });

                        var flist = Ext.create("Ext.List", {
                            fullscreen: true,
                            store: favestore,
                            //displayField: 'id',
                            text: 'name',
                            itemTpl: "{name}, {id} ",
                        });

                        /*var faveritelist  = Ext.create("Ext.List", {
                            fullscreen: true,
                            tabBarPosition: 'bottom',
                            //useToolbar:false,

                                //leaf: true ,
                                iconCls: 'star',
                                displayField: 'name',
                            treestore: {
                                type: 'tree',
                                id: 'name',

                                fields: [
                                    'name','id',
                                    {name: 'leaf', defaultValue: true}
                                ],

                                root: {
                                    leaf: true,
                                },
                                
                                name : 'favestore',
                                storeId: 'Favorite',
                                
                                proxy: {
                                    type: "sql",
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
                                                  //str1 = str1+ "<br>Row = " + i +" ID = "+ results.rows.item(i).fid +" <br>type = " +results.rows.item(i).ftype+" <br>name = " + results.rows.item(i).name;
                                                                                            //nestedList.getDetailCard().el.setHtml(str1);
                                          }//console.log(str1); nestedList.getDetailCard().el.setHtml(str1);
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
                                        )
}
                           
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


                        });*/


                        


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
                                cat = record.get('code');
                                
                                //if (cat == 'cinema'){
                                    //alert(cat);
                                var catdyn = cat;
                                    
                                //}

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
                                                    url: 'http://now-yakutsk.stairwaysoft.net/'+catdyn+'list.php',
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
                                                //var c_nam = post.get('name');
                                                //fid = post.get('cid');

                                                //alert(tqt);                             
                                                /*interval = 1000  //интервал повтора 1 секунда
                                                coef = 1349788541   // случайный коэффициент разницы текущего времени

                                                setInterval(function() {
                                                raccons = Math.round((new Date()).getTime() / 1000) - coef
                                                    console.log(raccons); //выводим в консоль. заменить на нужное, например $('#counter').text(raccons);
                                                }, interval);
                                                dd = 'background-color: blueviolet';*/
                                                //   =  'background-color: red';   

                                                //alert(cat);
                                                var fil = Ext.create('Ext.Container', {
                                                fullscreen: true,
                                                useToolbar:false,
                                                /*getItemTextTpl: function(node){
                                                    return '{filmpage}';
                                                }  */
                                                layout: 'vbox',
                                                items: [           {    
                                                                        xtype: 'carousel',
                                                                        height: '100px',
                        
                                                                        store: {
                                                                            type: 'tree',
                                                                            fields: [
                                                                                'b_image',
                                                                                 {name: 'leaf', defaultValue: true}
                                                                            ],

                                                                            root: {
                                                                                leaf: false
                                                                            },

                                                                            proxy: {
                                                                                type: 'jsonp',
                                                                                url: 'http://now-yakutsk.stairwaysoft.net/'+catdyn+'bannerlist.php',
                                                                                reader: {
                                                                                    type: 'json',
                                                                                    rootProperty: 'banner'
                                                                                }
                                                                            }},

                                                    
                                                                           items: [
                                                                                {
                                                                                    html : 'banner 1',
                                                                                    style: 'background-color: #5E99CC'
                                                                                },
                                                                                {
                                                                                    html : 'banner 2',
                                                                                    style: 'background-color: #759E60'
                                                                                },
                                                                                {
                                                                                    html : 'banner 3'
                                                                                }
                                                                            ]
                                                                     
                                                                    },
                                                                    {
                                                                        xtype : 'panel',
                                                                        height: '20px',
                                                                        html:'place for adress',
                                                                    },
                                                                   
                                                                    {
                                                                    scroll:'vertical',
                                                                    flex: 1,
                                                                    useToolbar:false,
                                                                    xtype: 'nestedlist', 
                                                                    iconCls: 'star',
                                                                    displayField: 'filmpage', 
                                                                    store:{
                                                                    
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
                                                                        url: 'http://now-yakutsk.stairwaysoft.net/'+catdyn+'filmlist.php?f_cid='+f_cid,
                                                                        reader: {
                                                                            type: 'json',
                                                                            rootProperty: 'films',
                                                                        }
                                                                    }}},
                                                                     

                                                                ],
                                                        
                                                          dockedItems: [
                                                            {   
                                                                xtype: 'toolbar',
                                                                docked: 'top',                                                            
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
                                                                                    favestore.add([{
                                                                                        name: s_name,
                                                                                        ftype: cat,
                                                                                        image: s_image,
                                                                                        link: '',
                                                                                        res : '',
                                                                                        fid : cfid,

                                                                                    }]);
                                                                                    favestore.sync();
                                                                                }

                                                                                },
                                                                                function (tx, error)
                                                                                {
                                                                                favestore .add([{
                                                                                        name: s_name,
                                                                                        ftype: cat,
                                                                                        image: s_image,
                                                                                        link: '',
                                                                                        res : '',
                                                                                        fid : cfid,

                                                                                    }]);
                                                                                   favestore.sync();
                                                                                }
                                                                                )});
                                                                                
                                                                            }
                                                                    }
                                                                    ,

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
                                                                //tb3 = this.getToolbar();tb3.hide();
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
                                                nestedList.setDetailCard(cin);
                                                break;
                                           case "events":
                                                //alert(cat);
                                                nestedList.setDetailCard(cin);
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
                                            
                                            nestedList.setDetailCard(flist);
         
                                                                        

                                        break;   
                                    case labelN:
                                           default:
                                           break;
                                    }                               //Ext.viewPort.setActiveItem('treeStore2');    
                                        //this.getToolbar().hide();
                                } 
                        } 
            });


        

