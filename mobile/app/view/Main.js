Ext.define('ListItem', {

    extend: 'Ext.data.Model',
    require: ["Ext.data.proxy.SQL", "Ext.field.Search", "Ext.NestedList"],
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
        dockedItems: [
                {   
                    xtype: 'toolbar',
                    docked: 'top',   
            items: [
 
                        {   iconCls : 'search',

                           handler: function(){
                                         

                                    about = Ext.create("Ext.NestedList", {
                                        xtype: 'nestedlist',
                                        fullscreen: true,
                                        displayField: 'list',
                                                store: {
                                                type: 'tree',
                                                leaf: true,
                                                fields: [
                                                    'name', 'link', 'list', 'image', 'adress', 'banner','cid',
                                                    {name: 'leaf', defaultValue: true}
                                                ],
                                                root: {
                                                    leaf: false
                                                },                        
                                                proxy: {
                                                    type: 'jsonp',
                                                    url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/'+'aboutus'+'list.php',
                                                    reader: {
                                                        type: 'json',
                                                        rootProperty: 'cinema'
                                                    }
                                                }
                                            },
                                            listeners: {
                                            activate : function() {     
                                                //tb1.show();
                                                tb2 = this.getToolbar();
                                                tb2.hide();
                                                //tb.hide(); 

                                            //this.getToolbar(treeStore2).hide();
                                             } ,
                                             deactivate: function() {
                                                tb.show();                             
                                                //tb1.hide();
                                                //this.getToolbar().hide();
                                            }
                                            ,
                                                leafitemtap: function(nestedList, list, index, element, post) {
                                                

                                                }
                                            }
                                }); 
                                    
                                    }
                                //var s_name = post.get('list');var s_image = post.get('image'); cfid = post.get('cid');
                                //adding to favorite
                               /*db.transaction(function(tx) {
                                    tx.executeSql("SELECT * FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat], function (tx, results) {
                                      len = results.rows.length;
                                      console.log(len);
                                      if (len  > 0 ) {
                                        Ext.Msg.alert("Удалено");
                                        tx.executeSql("DELETE FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat],  function(result1){

                                        });
                                    }
                                    else{
                                        Ext.Msg.alert("Добавлено");
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
                                    )});*/
                                    
                                //}
                        }
                        ,

                    ]
                }
            ], 

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
                url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/catlist.php',
                reader: {
                    type: 'json',
                    rootProperty: 'cat',
                }
            }
        },                                                                      
        listeners: {  activate : function() { 
                            tb = this.getToolbar();
                             } ,
                             deactivate: function() {
                            }
                            ,                       
                    leafitemtap: function(nestedList, list, index, target, record) {
                        cat = record.get('code');
                        var catdyn = cat;
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
                            text: 'name',
                            itemTpl: "{name}",
                        });
                                //display for default category
                                cin1 = Ext.create("Ext.NestedList", {
                                    fullscreen: true,
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
                                                    url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/'+catdyn+'list.php',
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
                                                //tb1.show();
                                                tb2 = this.getToolbar();
                                                tb2.hide();
                                                //tb.hide(); 

                                            //this.getToolbar(treeStore2).hide();
                                             } ,
                                             deactivate: function() {
                                                tb.show();                             
                                                //tb1.hide();
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
                                                                                url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/'+catdyn+'bannerlist.php',
                                                                                reader: {
                                                                                    type: 'json',
                                                                                    rootProperty: 'banner'
                                                                                }
                                                                            }},

                                                    
                                                                           items: [
                                                                                {
                                                                                    html : 'Здесь будет 1 баннер',
                                                                                    style: 'background-color: #5E99CC'
                                                                                },
                                                                                {
                                                                                    html : 'А здесь второй',
                                                                                    style: 'background-color: #759E60'
                                                                                },
                                                                                {
                                                                                    html : 'или третий'
                                                                                }
                                                                            ]
                                                                     
                                                                    },
                                                                    {
                                                                        xtype : 'panel',
                                                                        height: '20px',
                                                                        html:'...место для адресса... ',
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
                                                                        url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/'+catdyn+'filmlist.php?f_cid='+f_cid,
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
                                                                                tx.executeSql("SELECT * FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat], function (tx, results) {
                                                                                  len = results.rows.length;
                                                                                  console.log(len);
                                                                                  if (len  > 0 ) {
                                                                                    Ext.Msg.alert("Удалено");
                                                                                    tx.executeSql("DELETE FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat],  function(result1){

                                                                                    });
                                                                                }
                                                                                else{
                                                                                    Ext.Msg.alert('Добавлено');
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
                                                                //tb1.hide();
                                                                tb2.show();
                                                                //tb3 = this.getToolbar();tb3.hide();
                                                                tb.hide(); 


                                                        //this.getToolbar(treeStore2).hide();
                                                         } ,
                                                         deactivate: function() {
                                                            tb.show();                             
                                                            //tb1.show();
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
                                //display for about us +

                                //disply for nightlife category
                                cin2 = Ext.create('Ext.TabPanel', {
                                    tabBarPosition: 'bottom',
                                    fullscreen: true,
                                    defaults: {
                                        styleHtmlContent: true
                                    },
                                    detailCard: {
                                        xtype: 'panel',
                                        scrollable: true,
                                        styleHtmlContent: true
                                            },
                                    listeners:{
                                            activate : function() {     
                                                    tb.show(); 
                                                },
                                            deactivate: function(){
                                                }
                                             } ,
                                    items: [
                                        
                                        {   //xtype: 'nestedList',
                                            
                                            title: 'Сегодня',
                                            scroll:'vertical',
                                            xtype: 'nestedlist', 
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
                                                    url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/'+catdyn+'listtoday.php',
                                                    reader: {
                                                        type: 'json',
                                                        rootProperty: 'cinema'
                                                    }
                                                    }
                                            },
                                            listeners: {
                                                activate : function() {     
                                                tb2 = this.getToolbar();
                                                tb2.hide();
                                                 } ,
                                                 deactivate: function() {
                                                },

                                                leafitemtap: function(nestedList, list, index, element, post) {
                                                var f_cid = post.get('cid');
                                                var fil = Ext.create('Ext.Container', {
                                                fullscreen: true,
                                                useToolbar:false,
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
                                                                                url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/'+catdyn+'bannerlist.php',
                                                                                reader: {
                                                                                    type: 'json',
                                                                                    rootProperty: 'banner'
                                                                                }
                                                                            }},

                                                    
                                                                           items: [
                                                                                {
                                                                                    html : 'Здесь будет 1 баннер',
                                                                                    style: 'background-color: #5E99CC'
                                                                                },
                                                                                {
                                                                                    html : 'А здесь второй',
                                                                                    style: 'background-color: #759E60'
                                                                                },
                                                                                {
                                                                                    html : 'или третий'
                                                                                }
                                                                            ]
                                                                     
                                                                    },
                                                                    {
                                                                        xtype : 'panel',
                                                                        height: '20px',
                                                                        html:'...место для адресса... ',
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
                                                                        url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/'+catdyn+'filmlist.php?f_cid='+f_cid,
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
                                                                                tx.executeSql("SELECT * FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat], function (tx, results) {
                                                                                  len = results.rows.length;
                                                                                  console.log(len);
                                                                                  if (len  > 0 ) {
                                                                                    Ext.Msg.alert("Удалено");
                                                                                    tx.executeSql("DELETE FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat],  function(result1){

                                                                                    });
                                                                                }
                                                                                else{
                                                                                    Ext.Msg.alert("Добавлено");
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
                                                                tb.hide(); 
                                                                tb2.show();
                                                         } ,
                                                         deactivate: function() {
                                                            tb.show();                             
                                                            tb2.hide();
                                                            }
                                                        ,
                                                        }

                                            });     
                                                var detailCard = nestedList.getDetailCard();
                                                    nestedList.setDetailCard(fil);
                                                }
                                            }
                                            }
                                        ,
                                            {   //xtype: 'nestedList',
                                            
                                            title: 'Клубы',
                                            scroll:'vertical',
                                            //sflex: 1,
                                            xtype: 'nestedlist', 
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
                                                    url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/'+catdyn+'list.php',
                                                    reader: {
                                                        type: 'json',
                                                        rootProperty: 'cinema'
                                                    }
                                                    }
                                            },
                                            listeners: {
                                                activate : function() {     
                                                tb2 = this.getToolbar();
                                                tb2.hide();
                                                 } ,
                                                 deactivate: function() {
                                                },

                                                leafitemtap: function(nestedList, list, index, element, post) {
                                                var f_cid = post.get('cid');
                                                //alert(cat);
                                                var fil = Ext.create('Ext.Container', {
                                                fullscreen: true,
                                                useToolbar:false,
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
                                                                                url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/'+catdyn+'bannerlist.php',
                                                                                reader: {
                                                                                    type: 'json',
                                                                                    rootProperty: 'banner'
                                                                                }
                                                                            }},

                                                                           items: [
                                                                                {
                                                                                    html : 'Здесь будет 1 баннер',
                                                                                    style: 'background-color: #5E99CC'
                                                                                },
                                                                                {
                                                                                    html : 'А здесь второй',
                                                                                    style: 'background-color: #759E60'
                                                                                },
                                                                                {
                                                                                    html : 'или третий'
                                                                                }
                                                                            ]
                                                                     
                                                                    },
                                                                    {
                                                                        xtype : 'panel',
                                                                        height: '20px',
                                                                        html:'...место для адресса... ',
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
                                                                        url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/'+catdyn+'filmlist.php?f_cid='+f_cid,
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
                                                                                tx.executeSql("SELECT * FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat], function (tx, results) {
                                                                                  len = results.rows.length;
                                                                                  console.log(len);
                                                                                  if (len  > 0 ) {
                                                                                    Ext.Msg.alert("Удалено");
                                                                                    tx.executeSql("DELETE FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat],  function(result1){

                                                                                    });
                                                                                }
                                                                                else{
                                                                                    Ext.Msg.alert("Добавлено");
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
                                                                tb.hide(); 
                                                                tb2.show();
                                                         } ,
                                                         deactivate: function() {
                                                            tb.show();                             
                                                            tb2.hide();
                                                            }
                                                        ,
                                                        }

                                            });     
                                                var detailCard = nestedList.getDetailCard();
                                                    nestedList.setDetailCard(fil);
                                                }
                                            }
                                            }
                                        
                                        ]
                                    });
                                

                                about = Ext.create("Ext.NestedList", {
                                    fullscreen: true,
                                    displayField: 'list',
                                                store: {
                                                type: 'tree',
                                                leaf: true,
                                                fields: [
                                                    'name', 'link', 'list', 'image', 'adress', 'banner','cid',
                                                    {name: 'leaf', defaultValue: true}
                                                ],
                                                root: {
                                                    leaf: false
                                                },                        
                                                proxy: {
                                                    type: 'jsonp',
                                                    url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/'+catdyn+'list.php',
                                                    reader: {
                                                        type: 'json',
                                                        rootProperty: 'cinema'
                                                    }
                                                }
                                            },
                                            listeners: {
                                            activate : function() {     
                                                //tb1.show();
                                                tb2 = this.getToolbar();
                                                tb2.hide();
                                                //tb.hide(); 

                                            //this.getToolbar(treeStore2).hide();
                                             } ,
                                             deactivate: function() {
                                                tb.show();                             
                                                //tb1.hide();
                                                //this.getToolbar().hide();
                                            }
                                            ,
                                                leafitemtap: function(nestedList, list, index, element, post) {
                                                

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
                             } ,
                             deactivate: function() {       
                                //tb.show(); 
                            }
                            ,
                            leafitemtap: function(nestedList, list, index, target, record) {
                                
                                cat = record.get('code');
                                var catdyn = cat;
                                cin = Ext.create("Ext.NestedList", {
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
                                                    url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/'+catdyn+'list.php',
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
                                                var fil = Ext.create('Ext.Container', {
                                                fullscreen: true,
                                                useToolbar:false,
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
                                                                                url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/'+catdyn+'bannerlist.php',
                                                                                reader: {
                                                                                    type: 'json',
                                                                                    rootProperty: 'banner'
                                                                                }
                                                                            }},

                                                    
                                                                           items: [
                                                                                {
                                                                                    html : 'Здесь будет 1 баннер',
                                                                                    style: 'background-color: #5E99CC'
                                                                                },
                                                                                {
                                                                                    html : 'А здесь второй',
                                                                                    style: 'background-color: #759E60'
                                                                                },
                                                                                {
                                                                                    html : 'или третий'
                                                                                }
                                                                            ]
                                                                     
                                                                    },
                                                                    {
                                                                        xtype : 'panel',
                                                                        height: '20px',
                                                                        html:'...место для адресса... ',
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
                                                                        url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/'+catdyn+'filmlist.php?f_cid='+f_cid,
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
                                                                                tx.executeSql("SELECT * FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat], function (tx, results) {
                                                                                  len = results.rows.length;
                                                                                  console.log(len);
                                                                                  if (len  > 0 ) {
                                                                                    Ext.Msg.alert("Удалено");
                                                                                    tx.executeSql("DELETE FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat],  function(result1){

                                                                                    });
                                                                                }
                                                                                else{
                                                                                    Ext.Msg.alert("Добавлено");
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
                                                                tb.hide(); 

                                                         } ,
                                                         deactivate: function() {
                                                            tb1.show();
                                                            tb2.hide();
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
                                               var detailCard = nestedList.getDetailCard();
                                               nestedList.setDetailCard(cin);
                                               break;
                                           case "theatre":
                                                nestedList.setDetailCard(cin);
                                                break;
                                           case "events":
                                                nestedList.setDetailCard(cin);
                                                break;
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
                                        var detailCard = nestedList.getDetailCard(); 
                                        nestedList.setDetailCard(flist);
                                        break;
                                    case "nightlife":
                                        var detailCard = nestedList.getDetailCard(); 
                                        nestedList.setDetailCard(cin2);
                                        break                                    
                                    case "aboutus":
                                        var detailCard = nestedList.getDetailCard(); 
                                        nestedList.setDetailCard(about);
                                        break;
                                    
                                    default:
                                        var detailCard = nestedList.getDetailCard();
                                        nestedList.setDetailCard(cin1);
                                        break;
                                    }                              
                                } 
                        } 
            });


        

