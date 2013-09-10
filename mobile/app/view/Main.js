Ext.define('front.view.Main', {
    extend: 'Ext.data.Model',
    require: ["Ext.data.proxy.SQL", "Ext.field.Search", "Ext.NestedList", "Ext.data.Store"],
    config: {
        fields: ['text']
    },
    listeners:{
        intialize:function(){
        }
    }

});

    db = openDatabase("Sencha", "1.0", "Sencha", 20000);
        if(!db)
            {alert("Failed to connect to database.");}
        else
            {//alert('fuck yeah');
            }
    //Ext.require(['Ext.data.proxy.SQL']);
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
    root: {    leaf: false    },
    storeId: "search",
    model: "search"
});

    var favestore = Ext.create("Ext.data.Store", {
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
             });

    treestore = Ext.create("Ext.NestedList", {
        updateTitleText :false,
        useTitleAsBackText: false,
        defaultBackButtonText : null,
        backText: '<div class="backtext"></div>',
        fullscreen: true,
        tabBarPosition: 'bottom',
        useToolbar:true,
        id: 'mainPanel',
        title: '<div class="titleimg"></div>',
        displayField: 'title',
        layout: 'card',
        store: {
            type: 'tree',
            id: 'ListCard',
            fields: [
                'title','code','name','c_count',
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

                            tb.insert(3,[ {xtype:'spacer'}, {id: 'serch',align: 'right', xtype:'button', iconCls: 'none',
                                scope: this,
                                handler:
                                    function(button) {

                                    button.hide();
                                    treestore.hide();
                                    tb.show();
                                        tb.insert(3,[
                                            {xtype:'spacer'},
                                            {id: 'serch',align: 'right', xtype:'button', iconCls: 'none',
                                            scope: this,
                                            handler:function(){
                                                alert('d');
                                            }}]);

                                    ser = Ext.create('Ext.Container', {
                                    fullscreen: true,
                                    useToolbar : true,
                                    layout: 'fit',
                                            items: [
                                            {
                                                xtype:'toolbar', docked: 'top',title: '<div class="titleimg"></div>',
                                                items:[{

                                                        ui: 'back',
                                                        xtype: 'button',
                                                        text: '<img style=\"width:40px; float:left; margin-left:40px; margin-top:-57px; height:30px;\" src=./img/ico_menu.png><div style=\"margin-left:29px; margin-top:6px;\"></div>',
                                                        handler: function () {
                                                            ser.hide();
                                                            button.show();
                                                            treestore.show();
                                                            Ext.getCmp('serch').hide();
                                                        }

                                                }]

                                            },

                                            {
                                            xtype: 'fieldset',
                                            items: [{
                                                xtype: 'searchfield',
                                                placeHolder: 'Поиск...',
                                                name: 'title',
                                                id: 'inpt',
                                                listeners: {
                                                    scope: this,
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
                                xtype: 'list',
                                iconCls: 'star',
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
                        //Ext.getCmp('serch').destroy();
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
                               useToolbar: false,
                               useHeader:  false,
                               updateTitleText: false,

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
                                    tb.insert(4,[ {xtype:'spacer'},{ id:'save1', align:'right',xtype:'button', ui: 'round', text: 'Готово',
                                            handler: function (button1) {
                                                    button1.destroy();
                                                    button.show();
                                                    flist1.destroy();
                                                    flist.show();
                                            }}]);
                                            flist.hide();
                                            button.hide();
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
                                                    style     : 'margin-left: 100px; margin-top:-16px; float:left;  right: 0 !important; ',
                                                    width     : '100%',
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
                                                    flist1.show();
                                                    var navigationBar = this.getNavigationBar();
                                                    navigationBar.leftBox.query('button')[1].hide();
                                                    favestore.sync();
                                                    Ext.getCmp('ed').hide();
                                                    //fh1.show();

                                                    },
                                                    deactivate:function(){

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
                                itemtap:function(h, index, target, record, e, eOpts ){
                                    //nestedList.setDetailCard(fil);
                                    Ext.getCmp('ed').hide();
                                    console.log(record.raw.ftype);
                                    console.log(record.raw.fid);
                                    catdyn = record.raw.ftype;
                                    f_cid = record.raw.fid;

                                    fil = Ext.create('Ext.Container', {
                                        fullscreen: true,
                                        layout: 'vbox',
                                        items: [           {
                                            xtype: 'carousel',
                                            height: '0px',

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
                                                   // html : '<div style="background: url(http://now-yakutsk.stairwaysoft.net/mobile/img/'+ post.get('banner')+') !important; float: left; width: 100%; margin-top-top: 100px; height: 224px !important;"></div>'

                                                }
                                            ]

                                        },
                                            {
                                                xtype : 'panel'
                                                //height: bh,
                                                //html: '<div class="comp-location"><span class="locate"><i>'+post.get('adress')+'</i><b>'+post.get('phone')+'</b></span><a href="">'+post.get('site')+'</a></div>'+hinsert  // +'<div class="inside-h"><span class="h4">'+post.get('special')+'</span></div>'
                                            },


                                            {
                                                //scrollable:'vertical',
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

                                            initialize : function() {
                                                //s_name = post.get('list');
                                                //s_image = post.get('image');
                                               // cfid = post.get('cid');
                                                //cat1 = record.get('code');
  /*                                              if (typeof ttt != 'undefined'){

                                                }
                                                else{
                                                    ttt = (tb2.insert(3,[ {xtype:'spacer'},{align:'right', xtype:'button', id: 'fs_id',
                                                        handler: function(button){


                                                            //adding to favorite
                                                            db.transaction(function(tx) {
                                                                tx.executeSql("SELECT * FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat1], function (tx, results) {
                                                                        len = results.rows.length;
                                                                        console.log(len);
                                                                        if (len  > 0 ) {
                                                                            Ext.Msg.alert("Удалено");
                                                                            tx.executeSql("DELETE FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat1],  function(result1){

                                                                            });
                                                                        }
                                                                        else{
                                                                            Ext.Msg.alert("Добавлено");
                                                                            favestore.add([{
                                                                                name: s_name,
                                                                                ftype: cat1,
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
                                                                            ftype: cat1,
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
*/


                                                //tb3 = this.getToolbar();tb3.hide();
                                                ///b.hide();


                                                //this.getToolbar(treeStore2).hide();
                                            } ,
                                            deactivate: function() {
                                                //tb.show();

                                                //tb2.hide();

                                                //this.getToolbar().hide();
                                            }

                                        }

                                    });
                                    flist.hide();
                                    fil.show();






                                },
                               deactivate: function(button){
                                //tb.show();
                                tb.setTitle('<div class="titleimg"></div>'),
                                Ext.getCmp('serch').show();
                                Ext.getCmp('ed').hide();
                                   fil.destroy();
                                   flist.destroy();
                                   Ext.getCmp('serch').hide();

                                }
                                },
                                features : [
                                 {
                                    ftype    : 'Ext.grid.feature.Abstract',
                                    launchFn : 'constructor'
                                }
                                ],
                                 columns  : [
                                {
                                dataIndex : 'name',
                                style     : 'margin-left: -1px;',
                                width     : '100%',
                                filter    : { type : 'string' }
                                }
                                ],
                                hideOnMaskTap: true,
                                fullscreen: true,
                                store: favestore
                            });
                                //display for default category
                        if(catdyn!= 'poster' && catdyn!= 'favorite' && catdyn!= 'aboutus' ) {
                            cin1 = Ext.create("Ext.NestedList", {
                                fullscreen: true,
                                defaultBackButtonText : null,
                                updateTitleText:false,
                                backText: '<div class="backtext"></div>',
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
                                         } ,
                                         deactivate: function() {
                                            tb.show();
                                             tb.setTitle('<div class="titleimg"></div>');
                                             delete window.ttt;
                                        }
                                        ,
                                            leafitemtap: function(nestedList, list, index, element, post) {
                                            var f_cid = post.get('cid');
                                                tb2.setTitle(post.get('name'));
                                                console.log(post.get('special'));
                                            if((post.get('special'))!= undefined ) {
                                                bh='187px';
                                                hinsert = '<div class="inside-h"><span class="h4">'+post.get('special')+'</span></div>';
                                            }else{
                                                bh = '120px';
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
                                                                                html : '<div style="background: url(http://now-yakutsk.stairwaysoft.net/mobile/img/'+ post.get('banner')+') !important; float: left; width: 100%; margin-top-top: 100px; height: 224px !important;"></div>'

                                                                            }/*,
                                                                            {
                                                                                html : 'А здесь второй',
                                                                                style: 'background-color: #759E60'
                                                                            },
                                                                            {
                                                                                html : 'или третий'
                                                                            }*/
                                                                        ]

                                                                },
                                                                {
                                                                    xtype : 'panel',
                                                                    height: bh,
                                                                    html: '<div class="comp-location"><span class="locate"><i>'+post.get('adress')+'</i><b>'+post.get('phone')+'</b></span><a href="">'+post.get('site')+'</a></div>'+hinsert  // +'<div class="inside-h"><span class="h4">'+post.get('special')+'</span></div>'
                                                                },


                                                                {
                                                                //scrollable:'vertical',
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
                                                    initialize : function() {
                                                        s_name = post.get('list');
                                                        s_image = post.get('image');
                                                        cfid = post.get('cid');
                                                        cat1 = record.get('code');
                                                        if (typeof ttt != 'undefined'){

                                                        }
                                                        else{
                                                            ttt = (tb2.insert(3,[ {xtype:'spacer'},{align:'right', xtype:'button', id: 'fs_id',
                                                                handler: function(button){


                                                                    //adding to favorite
                                                                    db.transaction(function(tx) {
                                                                        tx.executeSql("SELECT * FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat1], function (tx, results) {
                                                                                len = results.rows.length;
                                                                                console.log(len);
                                                                                if (len  > 0 ) {
                                                                                    Ext.Msg.alert("Удалено");
                                                                                    tx.executeSql("DELETE FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat1],  function(result1){

                                                                                    });
                                                                                }
                                                                                else{
                                                                                    Ext.Msg.alert("Добавлено");
                                                                                    favestore.add([{
                                                                                        name: s_name,
                                                                                        ftype: cat1,
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
                                                                                    ftype: cat1,
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
                                    //fullscreen: true,
                                    updateTitleText :false,
                                    defaults: {
                                     styleHtmlContent: true
                                    },
                                    detailCard: {
                                        xtype: 'panel',
                                        //scrollable: true,
                                        styleHtmlContent: true
                                    },
                                    listeners:{
                                            activate : function() {
                                                    tb.show();
                                                    tb.setTitle(record.get('name'));
                                                },
                                            deactivate: function(){
                                                tb.setTitle('<div class="titleimg"></div>');
                                             }
                                             } ,
                                    items: [

                                        {
                                            title: 'Сегодня',
                                            //scrollable:'vertical',
                                            xtype: 'nestedlist',
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
                                                tb.show();
                                                tb2 = this.getToolbar();
                                                tb2.hide();
                                                delete window.ttt;
                                                 } ,
                                                 deactivate: function() {
                                                },

                                                leafitemtap: function(nestedList, list, index, element, post) {
                                                    tb2.setTitle(post.get('name'));
                                                    if((post.get('special'))!= undefined ) {
                                                    bh='132px';
                                                    hinsert = '<div class="inside-h"><span class="h4">'+post.get('special')+'</span></div>';
                                                }else{
                                                    bh = '90px';
                                                    hinsert = '';
                                                }
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
                                                                                    html : '<div style="background: url(http://now-yakutsk.stairwaysoft.net/mobile/img/'+ post.get('banner')+') !important; float: left; width: 100%; margin-top-top: 100px; height: 224px !important;"></div>'

                                                                                }/*,
                                                                                {
                                                                                    html : 'А здесь второй',
                                                                                    style: 'background-color: #759E60'
                                                                                },
                                                                                {
                                                                                    html : 'или третий'
                                                                                }*/
                                                                            ]

                                                                    },
                                                                    {
                                                                        xtype : 'panel',
                                                                        height: bh,
                                                                        html: '<div class="comp-location"><span class="locate"><i>'+post.get('adress')+'</i><b>'+post.get('phone')+'</b></span><a href="">'+post.get('site')+'</a><div>'

                                                                    },

                                                                    {
                                                                    //scrollable:'vertical',
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
                                                                                        ftype: cat1,
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
                                                                                        ftype: cat1,
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
                                                           // scrollable: true,
                                                            styleHtmlContent: true
                                                        },
                                                        listeners: {
                                                        activate : function() {
                                                            s_name = post.get('list');
                                                            s_image = post.get('image');
                                                            cfid = post.get('cid');
                                                            cat1 = record.get('code');
                                                            console.log(cat);
                                                            if (typeof ttt != 'undefined'){

                                                            }
                                                            else{
                                                                ttt = (tb2.insert(3,[ {xtype:'spacer'},{align:'right', xtype:'button', id: 'fs_id',
                                                                    handler: function(){



                                                                        //adding to favorite
                                                                        db.transaction(function(tx) {
                                                                            tx.executeSql("SELECT * FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat1], function (tx, results) {
                                                                                    len = results.rows.length;
                                                                                    console.log(len);
                                                                                    if (len  > 0 ) {
                                                                                        Ext.Msg.alert("Удалено");
                                                                                        tx.executeSql("DELETE FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat1],  function(result1){

                                                                                        });
                                                                                    }
                                                                                    else{
                                                                                        Ext.Msg.alert("Добавлено");
                                                                                        favestore.add([{
                                                                                            name: s_name,
                                                                                            ftype: cat1,
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
                                                                                        ftype: cat1,
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
                                            {
                                            title: 'Клубы',
                                            //scrollable:'vertical',

                                            xtype: 'nestedlist',
                                            //iconCls: 'star',
                                            displayField: 'list',
                                            defaultBackButtonText : null,
                                            updateTitleText:false,
                                                backText: '<div class="backtext"></div>',

                                                store: {
                                                type: 'tree',
                                                fields: [
                                                    'name', 'link', 'list', 'image', 'adress', 'banner','cid','site','phone',
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
                                                                                   height:'100px',
                                                                                   style: 'background: url(http://now-yakutsk.stairwaysoft.net/mobile/img/'+ post.get('banner')+')'

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
                                                                        height: 90,
                                                                        html: '<div class="comp-location"><span class="locate"><i>'+post.get('adress')+'</i><b>'+post.get('phone')+'</b></span><a href="">'+post.get('site')+'</a></div>'  // +'<div class="inside-h"><span class="h4">'+post.get('special')+'</span></div>'
                                                                    },

                                                                    {
                                                                    //scrollable:'vertical',
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
                                                            //llable: true,
                                                            styleHtmlContent: true
                                                        },
                                                        listeners: {
                                                        activate : function() {
                                                            tb.hide();
                                                            tb2.show();
                                                            s_name = post.get('list');
                                                            s_image = post.get('image');
                                                            cfid = post.get('cid');
                                                            cat1 = record.get('code');
                                                            console.log(cat);
                                                            if (typeof ttt != 'undefined'){

                                                            }
                                                            else{
                                                                ttt = (tb2.insert(3,[ {xtype:'spacer'},{align:'right', xtype:'button', id: 'fs_id',
                                                                    handler: function(){

                                                                        //adding to favorite
                                                                        db.transaction(function(tx) {
                                                                            tx.executeSql("SELECT * FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat1], function (tx, results) {
                                                                                    len = results.rows.length;
                                                                                    console.log(len);
                                                                                    if (len  > 0 ) {
                                                                                        Ext.Msg.alert("Удалено");
                                                                                        tx.executeSql("DELETE FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat1],  function(result1){

                                                                                        });
                                                                                    }
                                                                                    else{
                                                                                        Ext.Msg.alert("Добавлено");
                                                                                        favestore.add([{
                                                                                            name: s_name,
                                                                                            ftype: cat1,
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
                                                                                        ftype: cat1,
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
                        backText: '<div class="backtext">Афиша</div>',
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
                                                placeHolder: 'Поиск...',
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
                                 tb.setTitle('<div class="titleimg"></div>');

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
                                    defaultBackButtonText : null,
                                    updateTitleText:false,
                                    backText: '<div class="backtext"></div>',
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

                                                                                      html : '<div style="background: url(http://now-yakutsk.stairwaysoft.net/mobile/img/'+ post.get('banner')+') !important; float: left; width: 100%; margin-top-top: 100px; height: 224px !important;"></div>'
                                                                               //     style: 'width: 100%; margin-top-top: 100px; height: 134px !important;float:left; background:   url(http://now-yakutsk.stairwaysoft.net/mobile/img/'+ post.get('banner')+');'
                                                                                }/*,
                                                                                {
                                                                                    html : 'А здесь второй',
                                                                                    style: 'background-color: #759E60; float:left; '
                                                                                },
                                                                                {
                                                                                    html : 'или третий'
                                                                                }*/
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

                                                                    activate : function() {
                                                                        s_name = post.get('list');
                                                                        s_image = post.get('image');
                                                                        cfid = post.get('cid');
                                                                        cat1 = record.get('code');
                                                                        console.log(cat);
                                                                            if (typeof ttt != 'undefined'){

                                                                            }
                                                                            else{
                                                                            ttt = (tb2.insert(3,[ {xtype:'spacer'},{align:'right', xtype:'button', id: 'fs_id',
                                                                            handler: function(){



                                                                                //adding to favorite
                                                                                db.transaction(function(tx) {
                                                                                    tx.executeSql("SELECT * FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat1], function (tx, results) {
                                                                                            len = results.rows.length;
                                                                                            console.log(len);
                                                                                            if (len  > 0 ) {
                                                                                                Ext.Msg.alert("Удалено");
                                                                                                tx.executeSql("DELETE FROM Favorite WHERE fid=? AND ftype=?", [cfid,cat1],  function(result1){

                                                                                                });
                                                                                            }
                                                                                            else{
                                                                                                Ext.Msg.alert("Добавлено");
                                                                                                favestore.add([{
                                                                                                    name: s_name,
                                                                                                    ftype: cat1,
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
                                                                                                ftype: cat1,
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
                                if(record.get('c_count')>0 ){
                                switch (code) {
                                    case "poster":
                                            //console.log(record.get('c_count'));
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
                                else{
                                    nestedList.setDetailCard(block);
                                }

                                }
                        }
         }
        );





