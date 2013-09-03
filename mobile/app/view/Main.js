var value;
Ext.define('front.view.Main', {
    extend: 'Ext.data.Model',
    require: ["Ext.data.proxy.SQL", "Ext.field.Search", "Ext.NestedList", "Ext.data.Store"],
    config: {
        fields: ['text']
    }

});

Ext.require([
    'Ext.grid.List',
    'Ext.grid.feature.Feature',
    'Ext.grid.feature.CheckboxSelection'
]);

    db = openDatabase("Sencha", "1.0", "Sencha", 200000);
        if(!db)
            {alert("Failed to connect to database.");}
        else
            {//alert('fuck yeah');
            }
    Ext.require(['Ext.data.proxy.SQL']);
        Ext.define("Favorite", {
        extend: "Ext.data.Model",
        config: {
        fields: ["id","name","ftype","image","link","res", "fid"]
        }
    });

    Ext.define("search", {
        extend: "Ext.data.Model",
        config: {
            fields: [
                {name: "name", type: "string"},
                {name: "filmpage",  type: "string"},
                {name: "id",       type: "int"},
                {name: 'leaf', defaultValue: true}
            ]
        }
    });
    var search = Ext.create("Ext.data.Store", {
    type: 'tree',
    root: {
    leaf: false
    },
    storeId: "search",
    model: "search"
});

    /*var favestore = Ext.create("Ext.data.Store", {
        model: "Favorite",defaultRootProperty: 'items',
        storeId: 'Favorite',
        proxy: {
            type: "sql"
        },
        grouper: {
            groupFn: function(record) {
                return record.get('name');
            }
        },
        autoLoad: true
             });*/

    Ext.create("Ext.NestedList", {
        updateTitleText :false,
        useTitleAsBackText: false,
        defaultBackButtonText : null,
        backText: '<img style=\"width:20px; float:left; margin-left:7px; margin-top:5px; height:40px;\" src=./img/main-ico.png><div style=\"margin-left:29px; margin-top:6px;\">Главная</div>',
       // backButton: 'img/main-ico.png',
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
                'title','code','name',
                {name: 'leaf', defaultValue: true}
            ],

            root: {
                leaf: false
            },
            proxy: {
                type: 'jsonp',
                url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/catlist.php',
                reader: {
                    type: 'json',
                    rootProperty: 'cat'
                }
            }
        },
        listeners: {
                    activate : function() {
                            tbr = this.getToolbar();
                            tb = this.getToolbar();
                            //tb.setTitle('Now-Yakutsk');
                            tb.insert(3,[ {xtype:'spacer'}, {id: 'serch',align: 'right', xtype:'button', iconCls: 'none',
                                scope: this,
                                handler:
                                    function(button) {
                                    button.hide();
                                    ser = Ext.create('Ext.Container', {
                                    fullscreen: true,
                                    toolbar : true,
                                    layout:'vbox',
                                    dockedItems: {
                                        xtype: 'toolbar',
                                        docked: 'top',
                                            items: [

                                                    {
                                                    ui: 'back',
                                                    xtype: 'button',
                                                    text: 'back',
                                                    handler: function () {
                                                        ser.hide();
                                                        button.show();
                                                    }
                                                }
                                                ]
                                            },
                                            items: [
                                            {
                                            xtype: 'fieldset',
                                            items: [{
                                                xtype: 'searchfield',
                                                placeHolder: 'Search...',
                                                name: 'title',
                                                id: 'inpt',
                                                listeners: {
                                                    scope: this,
                                                     //clearicontap: this.onSearchClearIconTap,
                                                    keyup: function(){
                                                    value = Ext.ComponentQuery.query('#inpt')[0].getValue();
                                                    Ext.Ajax.request({
                                                        url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/search.php?value='+value,
                                                        success: function(response){
                                                            var text = Ext.decode(response.responseText.trim());
                                                            search.removeAll();
                                                            search.add(text.films);
                                                            console.log(search);
                                                                    }
                                                                });

                                                                }

                                                            }

                                                        }]

                            },
                            {
                                useToolbar:false,
                                xtype: 'list',
                                iconCls: 'star',
                                flex:1,
                               // displayField: 'filmpage',
                                itemTpl: "{filmpage}",
                                store: search

                            }]
                        });
                        ser.show();
                        }
                        }]);

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
                        grouper: {
                            groupFn: function(record) {
                                var ind = record.get('ftype');
                                switch (ind) {
                                    case "cinema":
                                    gr = "Кино";
                                    break;
                                    case "theatre":
                                    gr = "Театры";
                                    break;
                                    case "events":
                                    gr = "Мероприятия";
                                    break;
                                    case "restaurant":
                                    gr = "Рестораны";
                                    break;
                                    case "beautyandhealh":
                                    gr = "Здоровье и красота";
                                    break;
                                    case "shipment":
                                    gr = "Доставка";
                                    break;
                                    case "nightlife":
                                    gr = "Ночная жизнь";
                                    break;
                                    case "entertainment":
                                    gr = "Развлечение";
                                    break;
                                };
                                return (gr);
                        }},
                        autoLoad: true
                             });

                        var flist = Ext.create("Ext.grid.List", {
                               grouped     : true,
                               indexBar    : false,
                               useToolbar:false,
                               useHeader: false,
                                updateTitleText :false,

                            listeners:{
                               activate: function(button){
                                tb.setTitle('Избранное');
                                favestore.sync();
                                Ext.getCmp('serch').hide();
                                fed = Ext.getCmp('ed');
                                if(typeof fed != 'undefined') {
                                Ext.getCmp('ed').destroy();
                                }
                                //Ext.getCmp('ed').destroy();

                                fh = this.getHeader();
                                fh.hide();

                                tb.insert(4,[ {xtype:'spacer'},{ id:'ed', align:'right',xtype:'button', ui: 'round', text: 'Правка',
                                    handler: function (button) {
                                            var favestore = Ext.create("Ext.data.Store", {
                                            model: "Favorite",defaultRootProperty: 'items',
                                            storeId: 'Favorite',
                                            proxy: {
                                                type: "sql"
                                            },
                                            grouper: {
                                                    groupFn: function(record) {
                                                    var ind = record.get('ftype');
                                                    switch (ind) {
                                                        case "cinema":
                                                        gr = "Кино";
                                                        break;
                                                        case "theatre":
                                                        gr = "Театры";
                                                        break;
                                                        case "events":
                                                        gr = "Мероприятия";
                                                        break;
                                                        case "restaurant":
                                                        gr = "Рестораны";
                                                        break;
                                                        case "beautyandhealh":
                                                        gr = "Здоровье и красота";
                                                        break;
                                                        case "shipment":
                                                        gr = "Доставка";
                                                        break;
                                                        case "nightlife":
                                                        gr = "Ночная жизнь";
                                                        break;
                                                        case "entertainment":
                                                        gr = "Развлечение";
                                                        break;
                                                    };
                                                        return (gr);
                                                }},
                                                autoLoad: true });

                                                        var flist1 = Ext.create("Ext.grid.List", {
                                                        grouped     : true,
                                                        indexBar    : false,
                                                        useToolbar:false,
                                                        useHeader: false,
                                                        updateTitleText :false,

                                                        features : [
                                                        {
                                                            ftype    : 'Ext.grid.feature.CheckboxSelection',
                                                            launchFn : 'constructor'
                                                        }
                                                        ],
                                                             columns  : [
                                                            {
                                                            dataIndex : 'name',
                                                            style     : 'padding-left: 1em;',
                                                            width     : '40%',
                                                            filter    : { type : 'string' }
                                                            }
                                                            ],

                                                            hideOnMaskTap: true,
                                                            fullscreen: true,
                                                            store: favestore,
                                                            text: 'name',

                                                            listeners: {
                                                            activate: function(){
                                                            //fh2 = nestedList.getHeader();
                                                            console.log(nestedList.getHeader());
                                                            fh2.hide();
                                                            flist.hide();



                                                            favestore.sync();
                                                            Ext.getCmp('ed').hide();
                                                            //fh1.show();

                                                            },

                                                            itemtap: function( h, index, target, record, e, eOpts ){
                                                                console.log(record.raw.id);
                                                                did = record.raw.id;
                                                                db.transaction(function(tx) {

                                                                        Ext.Msg.alert("Удалено");
                                                                        tx.executeSql("DELETE FROM Favorite WHERE id=? ", [did],  function(result1){

                                                                        favestore.sync();
                                                                        }); favestore.sync();
                                                                    }); favestore.sync();
                                                                record.destroy();

                                                            }

                                                            },
                                                            dockedItems: {
                                                                    xtype: 'toolbar',
                                                                    docked: 'top',
                                                                    title: 'Избранное',
                                                                        items: [{xtype: 'spacer'},

                                                                                {
                                                                                ui: 'round',
                                                                                xtype: 'button',
                                                                                text: 'Готово',
                                                                                handler: function (button) {
                                                                                    //button.show();
                                                                                    flist1.hide();
                                                                                    flist.show();
                                                                                }
                                                                            }
                                                                            ]
                                                                        }

                                                    });
                                                        fd = (flist1.getHeader());
                                                        fd.destroy();
                                                        flist1.show();
                                    }
                                                                            }
                                                                            ]
                                                                            );

                               },
                               deactivate: function(button){
                                //tb.show();
                                tb.setTitle('Now-Yakutsk');
                                Ext.getCmp('serch').show();
                                Ext.getCmp('ed').hide();

                               }
                                },
                                features : [
                                 {
                                    ftype    : 'Ext.grid.feature.CheckboxSelection',
                                    launchFn : 'constructor'
                                }
                                ],
                                 columns  : [
                                {
                                dataIndex : 'name',
                                style     : 'padding-left: 1em;',
                                width     : '40%',
                                filter    : { type : 'string' }
                                }
                                ],
                                hideOnMaskTap: true,
                                fullscreen: true,
                                store: favestore,
                                text: 'name',
                                displayField: "name"
                            });
                                //display for default category
                                if(catdyn!= 'poster' && catdyn!= 'favorite' && catdyn!= 'aboutus' ) {
                                cin1 = Ext.create("Ext.NestedList", {
                                    fullscreen: true,
                                    defaultBackButtonText : null,
                                    updateTitleText:false,
                                    backText: '<img style=\"width:20px; float:left; margin-left:7px; margin-top:5px; height:40px;\" src=./img/main-ico.png></div>',
                                    displayField: 'list',
                                                store: {
                                                type: 'tree',
                                                fields: [
                                                    'name', 'link', 'list', 'image', 'adress', 'banner','cid','phone','site','special',
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

                                                tb2 = this.getToolbar();
                                                tb2.hide();

                                                tb.setTitle(record.get('name'));

                                            //this.getToolbar(treeStore2).hide();
                                             } ,
                                             deactivate: function() {
                                                tb.show();
                                                tb.setTitle('Now-Yakutsk');
                                            }
                                            ,
                                                leafitemtap: function(nestedList, list, index, element, post) {
                                                var f_cid = post.get('cid');

                                                    console.log(post.get('special'));
                                                if((post.get('special'))!= undefined ) {
                                                    bh='132px';
                                                    hinsert = '<div class="inside-h"><span class="h4">'+post.get('special')+'</span></div>';
                                                }else{
                                                    bh = '90px';
                                                    hinsert = '';
                                                }


                                                var fil = Ext.create('Ext.Container', {
                                                fullscreen: true,

                                                layout: 'vbox',
                                                items: [           {
                                                                        xtype: 'carousel',
                                                                        height: '220px',

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
                                                                                style: 'background:   url(/mobile/img/'+ post.get('banner')+')'

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
                                                                        height: bh,
                                                                        html: '<div class="comp-location"><span class="locate"><i>'+post.get('adress')+'</i><b>'+post.get('phone')+'</b></span><a href="">'+post.get('site')+'</a></div>'+hinsert  // +'<div class="inside-h"><span class="h4">'+post.get('special')+'</span></div>'
                                                                    },


                                                                    {
                                                                    scrollable:'vertical',
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
                                                                            rootProperty: 'films'
                                                                        }
                                                                    }}}


                                                                ],


                                                        listeners: {
                                                        activate : function() {
                                                                //tb1.hide();
                                                                if (typeof ttt != 'undefined'){

                                                                            }
                                                                            else{
                                                                            ttt = (tb2.insert(3,[ {xtype:'spacer'},{align:'right', xtype:'button', id: 'fs_id',
                                                                            handler: function(button){

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
                                                                                        fid : cfid

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
                                                                                        fid : cfid

                                                                                    }]);
                                                                                   favestore.sync();
                                                                                }
                                                                                )});

                                                                            }

                                                                            }]));

                                                                            }


                                                                tb2.show();



                                                                //tb3 = this.getToolbar();tb3.hide();
                                                                tb.hide();


                                                        //this.getToolbar(treeStore2).hide();
                                                         } ,
                                                         deactivate: function() {
                                                            tb.show();

                                                            tb2.hide();
                                                            //this.getToolbar().hide();
                                                            }

                                                        }

                                            });
                                                    nestedList.getDetailCard();
                                                    nestedList.setDetailCard(fil);
                                                }
                                            }
                                });
                                }
                                //display for about us +

                                //disply for nightlife category
                                if(catdyn!= 'poster' && catdyn!= 'aboutus' && catdyn!= 'beautyandhealh' && catdyn!= 'shipment' && catdyn!= 'entertainment' && catdyn!= 'restaurant' && catdyn!= 'favorite' ) {
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
                                            scrollable:'vertical',
                                            xtype: 'nestedlist',
                                            iconCls: 'star',
                                            displayField: 'list',

                                            store: {
                                                type: 'tree',
                                                fields: [
                                                    'name', 'link', 'list', 'image', 'adress', 'banner','cid','phone',
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
                                                tb2.hide();delete window.ttt;
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
                                                                                    style: 'background:   url(/mobile/img/'+ post.get('banner')+')'

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
                                                                        height: '90px',
                                                                        html: '<div class="comp-location"><span class="locate"><i>'+post.get('adress')+'</i><b>'+post.get('phone')+'</b></span><a href="">'+post.get('site')+'</a><div>'

                                                                    },

                                                                    {
                                                                    scrollable:'vertical',
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
                                                                            rootProperty: 'films'
                                                                        }
                                                                    }}}


                                                                ],

                                                          dockedItems: [
                                                            {
                                                                xtype: 'toolbar',
                                                                docked: 'top',
                                                                items: [
                                                                    {
                                                                        iconCls: 'star',
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
                                                                                        fid : cfid

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
                                                                                        fid : cfid

                                                                                    }]);
                                                                                   favestore.sync();
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
                                                                tb.hide();
                                                                tb2.show();
                                                         } ,
                                                         deactivate: function() {
                                                            tb.show();
                                                            tb2.hide();

                                                            }

                                                        }

                                            });
                                                    nestedList.getDetailCard();
                                                    nestedList.setDetailCard(fil);
                                                }
                                            }
                                            }
                                        ,
                                            {   //xtype: 'nestedList',

                                            title: 'Клубы',
                                            scrollable:'vertical',
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
                                                                        html:'...место для адресса... '
                                                                    },

                                                                    {
                                                                    scrollable:'vertical',
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
                                                                            rootProperty: 'films'
                                                                        }
                                                                    }}}

                                                                ],

                                                          dockedItems: [
                                                            {
                                                                xtype: 'toolbar',
                                                                docked: 'top',
                                                                items: [
                                                                    {
                                                                        iconCls: 'star',
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
                                                                                        fid : cfid

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
                                                                                        fid : cfid

                                                                                    }]);
                                                                                   favestore.sync();
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
                                                                tb.hide();
                                                                tb2.show();
                                                         } ,
                                                         deactivate: function() {
                                                            tb.show();
                                                            tb2.hide();
                                                            }

                                                        }

                                            });
                                                    nestedList.getDetailCard();
                                                    nestedList.setDetailCard(fil);
                                                }
                                            }
                                            }

                                        ]
                                    });

                                }
                                if(catdyn!= 'poster' && catdyn!= 'favorite' ) {
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
                                                Ext.getCmp('serch').hide();
                                                tb2 = this.getToolbar();
                                                tb2.hide();
                                            } ,
                                             deactivate: function() {
                                                tb.show();
                                                Ext.getCmp('serch').show();
                                            }
                                            }
                                });

                                }

                        var treeStore2 = Ext.create("Ext.NestedList", {
                        fullscreen: true,
                        tabBarPosition: 'bottom',
                        updateTitleText :false,
                        useTitleAsBackText: false,
                        defaultBackButtonText : null,
                        backText: '<img style=\"width:20px; float:left; margin-left:7px; margin-top:5px; height:40px;\" src=./img/main-ico.png><div style=\"margin-left:29px; margin-top:6px;\">Афиша</div>',
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
                                url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/catlist2.php',
                                reader: {
                                    type: 'json',
                                    rootProperty: 'cat'
                                }
                            }
                        },


                        listeners: {
                             activate : function() {
                                tb1 = this.getToolbar();
                                tb1.insert(3,[ {xtype:'spacer'}, {id:'serch', align: 'right', xtype:'button', iconCls: 'none',
                                                scope: this,
                                                handler:
                                                    function(button) {
                                                    button.hide();
                                                    ser = Ext.create('Ext.Container', {
                                                    fullscreen: true,
                                                    toolbar : true,
                                                    layout:'vbox',
                                                    dockedItems: {
                                                        xtype: 'toolbar',
                                                        docked: 'top',
                                                            items: [

                                                                    {
                                                                    ui: 'back',
                                                                    xtype: 'button',
                                                                    text: 'back',
                                                                    handler: function () {
                                                                        ser.hide();
                                                                        button.show();
                                                                    }
                                                                }
                                                                ]
                                                            },
                                                            items: [
                                            {
                                            xtype: 'fieldset',
                                            items: [{
                                                xtype: 'searchfield',
                                                placeHolder: 'Search...',
                                                name: 'title',
                                                id: 'inpt',
                                                listeners: {
                                                    scope: this,
                                                     //clearicontap: this.onSearchClearIconTap,
                                                    keyup: function(){
                                                    value = Ext.ComponentQuery.query('#inpt')[0].getValue();
                                                    Ext.Ajax.request({
                                                        url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/search.php?value='+value,
                                                        success: function(response){
                                                            var text = Ext.decode(response.responseText.trim());
                                                            search.removeAll();
                                                            search.add(text.films);
                                                            console.log(search);
                                                                    }
                                                                });

                                                                }

                                                            }

                                                        }]

                                                    },
                                                    {
                                                        useToolbar:false,
                                                        xtype: 'list',
                                                        iconCls: 'star',
                                                        flex:1,
                                                       // displayField: 'filmpage',
                                                        itemTpl: "{filmpage}",
                                                        store: search

                                                    }]
                                                });
                                                ser.show();
                                                }
                                                }]);
                                    //console.log(tb1.getTitle());


                                tb1.hide();
                                tb.setTitle('Афиша');


                             } ,
                             deactivate: function() {
                                tb.setTitle('Now-Yakutsk');
                                //tb.show();
                            }
                            ,
                            leafitemtap: function(nestedList, list, index, target, record) {
                                cat = record.get('code');
                                if(cat== 'cinema' ){
                                    tb1.setTitle('Кинотеатры');
                                }
                                else if(cat== 'theatre'){
                                    tb1.setTitle('Театры');
                                }
                                else if(cat== 'events'){
                                    tb1.setTitle('Мероприятия');
                                }
                                var catdyn = cat;
                                cin = Ext.create("Ext.NestedList", {
                                    fullscreen: true,
                                    tabBarPosition: 'bottom',
                                    defaultBackButtonText : null,
                                    updateTitleText:false,
                                    backText: '<img style=\"width:20px; float:left; margin-left:7px; margin-top:5px; height:40px;\" src=./img/main-ico.png></div>',
                                    scrollable:'vertical',
                                    //useToolbar:false,
                                            //title: 'Blog',
                                            iconCls: 'star',
                                            displayField: 'list',
                                                store: {
                                                type: 'tree',

                                                fields: [
                                                    'name', 'link', 'list', 'image', 'adress', 'banner','cid','phone','site',
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
                                         } ,
                                             deactivate: function() {
                                                tb.show();
                                                tb1.hide();
                                                tb2.hide();delete window.ttt;
                                            },
                                                leafitemtap: function(nestedList, list, index, element, post) {
                                                                        var f_cid = post.get('cid');
                                                                        tb2.setTitle(post.get('name'));
                                                                        //console.log(post.get('banner'));

                                                                        var fil = Ext.create('Ext.Container', {
                                                                        fullscreen: true,
                                                                        //useToolbar:true,
                                                                        layout: 'vbox',
                                                                        items: [           {
                                                                        xtype: 'carousel',
                                                                        height: '225px',
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
                                                                                    //html : '<span class="locate"><i>Улица кино номер 34</i><b>111</b></span>',
                                                                                    style: 'background:   url(/mobile/img/'+ post.get('banner')+')'
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
                                                                        height: '90px',
                                                                        html: '<div class="comp-location"><span class="locate"><i>'+post.get('adress')+'</i><b>'+post.get('phone')+'</b></span><a href="">'+post.get('site')+'</a><div>'

                                                                        },

                                                                    {

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
                                                                            rootProperty: 'films'
                                                                        }
                                                                    }}}
                                                               ],


                                                                    detailCard: {
                                                                        xtype: 'panel',
                                                                        scrollable: true,
                                                                        styleHtmlContent: true
                                                                    },
                                                                    listeners: {

                                                                    initialize : function(button) {
                                                                            if (typeof ttt != 'undefined'){

                                                                            }
                                                                            else{
                                                                            ttt = (tb2.insert(3,[ {xtype:'spacer'},{align:'right', xtype:'button', id: 'fs_id',
                                                                            handler: function(button){

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
                                                                                        fid : cfid
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
                                                                                        fid : cfid

                                                                                    }]);
                                                                                   favestore.sync();
                                                                                }
                                                                                )});

                                                                            }

                                                                            }]));

                                                                            }


                                                                            tb2.show();

                                                                            tb1.hide();

                                                                     } ,
                                                                     deactivate: function() {

                                                                        tb1.show();
                                                                        tb2.hide();
                                                                        tb.hide();
                                                                        }

                                                                    }

                                            });
                                                    nestedList.getDetailCard();
                                                    nestedList.setDetailCard(fil);
                                                }
                                            }
                                });
                                        var cat = (record.get('code'));
                                        switch (cat) {
                                           case "cinema":
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
                                        }
                                        }
                                    }
                                });
                                var code = (record.get('code'));
                                switch (code) {
                                    case "poster":
                                       nestedList.setDetailCard(treeStore2);
                                       break;
                                    case "favorite":
                                        nestedList.setDetailCard(flist);
                                        break;
                                    case "nightlife":
                                        nestedList.setDetailCard(cin2);
                                        break;
                                    case "aboutus":
                                        nestedList.setDetailCard(about);
                                        break;
                                    default:
                                        nestedList.setDetailCard(cin1);
                                        break;
                                    }
                                }
                        }
         }
        );





