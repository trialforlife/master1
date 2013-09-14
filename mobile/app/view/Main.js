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
    Ext.define("Favorite", {
        extend: "Ext.data.Model",
        proxy: {
            type: 'localstorage',
            id  : 'Favorite'
        },
        config: {
            fields: ["id","name","ftype","image","site","banner","adress","phone", "fid"]
        }
    });
    var favestore = Ext.create("Ext.data.Store", {
        model: "Favorite",defaultRootProperty: 'items',
        storeId: 'Favorite',
        proxy: {
            type: 'localstorage'
        },
        grouper: {
            groupFn: function(record) {
                return record.get('name');
            }
        },
        autoLoad: true
    });
    var f_count = favestore._totalCount;
    Ext.define("search", {
        extend: "Ext.data.Model",
        config: {
            fields: [
                {name: "name", type: "string"},
                {name: "filmpage",  type: "string"},
                {name: "id",       type: "int"},
                {name: "scat",       type: "string"},
                {name: "cid",       type: "int"},
                {name: "site",       type: "string"},
                {name: "adress",       type: "string"},
                {name: "phone",       type: "string"},
                {name: "banner",       type: "banner"},
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

treestore = Ext.create("Ext.NestedList", {

        fullscreen: true,
        config:{
            scrollable:'vertcal',
            layout: 'card'
        },

        updateTitleText :false,
        useTitleAsBackText: false,
        defaultBackButtonText : null,
        backText: '<div class="backtext"></div>',

        tabBarPosition: 'bottom',
        useToolbar:true,
        id: 'mainPanel',
        /*listConfig:{
            itemTpl:'<div class="nav-element"><span style="" class="txt">{name}</span><span class="calc">'+f_count+'</span></div>'
        },*/
        title: '<div class="titleimg"></div>',
        displayField: 'title',
//        layout: 'card',
        store: {
            storeId:'ms',
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
                url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/catlist.php?f_count='+f_count,
                reader: {
                    type: 'json',
                    rootProperty: 'cat'
                }
            }
        },
        listeners: {
                    activate : function() {

                        if(typeof flist1 != 'undefined') {
                            console.log(flist1);
                        }


                         tbr = this.getToolbar();
                            tb = this.getToolbar();
                            tb.insert(3,[ {xtype:'spacer'}, {id: 'serch',align: 'right', xtype:'button', iconCls: 'none',
                                scope: this,
                                handler:
                                    function(button) {
                                    button.hide();
                                    treestore.hide();
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
                                store: search,
                                listeners:{
                                    itemtap:function(h, index, target, record, e, eOpts ){
                                        f_cid = record.get('cid');
                                         catdyn = record.get('scat');
                                       // ser.hide();

                                        var fil = Ext.create('Ext.Container', {
                                            fullscreen: true,
                                            layout: 'vbox',
                                            items:[{
                                                xtype:'toolbar',
                                                docked:'top',
                                                title: record.get('name'),
                                                    items: [{
                                                        ui: 'back',
                                                        xtype: 'button',
                                                        id: 'sback',
                                                        handler: function (button) {
                                                            fil.destroy();
                                                            ser.show();

                                                        }

                                                    },
                                                        {xtype: 'carousel',
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
                                                        html : '<div style="background: url(http://now-yakutsk.stairwaysoft.net/mobile/img/'+ record.get('banner')+') !important; float: left; width: 100%; margin-top-top: 100px; height: 224px !important;"></div>'

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
                                                    // height: '120px',
                                                    html: '<div class="comp-location"><span class="locate"><i>'+record.get('adress')+'</i><b>'+record.get('phone')+'</b></span><a href="">'+record.get('site')+'</a><div>'

                                                },

                                                {
                                                    //scrollable:'vertical',
                                                    flex: 1,
                                                    useToolbar:true,
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


                                            ]
                                            }],

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
                                                                var banner = post.get('banner');
                                                                var site = post.get('site');
                                                                var adress = post.get('adress');
                                                                var photo = post.get('photo');


                                                                myConfirm('сообщение ', alert);

                                                                function myConfirm(msg, func){
                                                                    var div=document.createElement('div');
                                                                    div.style.cssText="text-align:center;padding:10px;position:fixed;width:200px;height:40px;bottom:50%;right:50%;margin-right:-100px;margin-bottom:-20px;border:1px dotted #000"
                                                                    div.onclick=function(e){
                                                                        var t=e?e.target:window.event.srcElement;
                                                                        if(t.tagName=='INPUT'){
                                                                            t.value=='Обновить'&&func('да');
                                                                            this.parentNode.removeChild(this)
                                                                        }
                                                                    }
                                                                    div.innerHTML="<div style='margin-top: -100px; margin-left: -50px; width: 320px; height: 155px; position:absolute; z-index: 10000; background: url(./img/error_wind.png) top center no-repeat;'><p style='color: #fff; font: 24px Hlvl; text-align: center; padding: 85px 0 33px;'>Добавлено</p><input class='x-msgbox-buttons x-add' type='button' value='Ок'></div>";

                                                                    return document.body.appendChild(div);
                                                                }



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
                                                    s_image = post.get('image');
                                                    cfid = post.get('cid');
                                                    cat1 = record.get('code');
                                                    banner = post.get('banner');
                                                    site = post.get('site');
                                                    adress = post.get('adress');
                                                    phone = post.get('phone');
                                                    ds_name = post.get('list');
                                                    ditem = favestore.findRecord('name',ds_name);
                                                    if (typeof ttt != 'undefined'){

                                                    }
                                                    else{
                                                        ttt = (tb2.insert(3,[ {xtype:'spacer'},{align:'right', xtype:'button', id: 'fs_id',
                                                            handler: function(){
                                                                if(ditem!= null)
                                                                {
                                                                    favestore.remove(ditem);
                                                                }
                                                                else
                                                                {
                                                                    favestore.add([{
                                                                        name: ds_name,
                                                                        ftype: cat1,
                                                                        image: s_image,
                                                                        site: site,
                                                                        banner: banner,
                                                                        adress: adress,
                                                                        phone: phone,
                                                                        fid : cfid
                                                                    }]);
                                                                    Ext.Msg.alert("<div style='background: blueviolet !important; width: 100px; height: 100px;'>Добавлено</div>");
                                                                }
                                                                favestore.sync();
                                                                delete window.ditem;


                                                            }

                                                        }]));

                                                    }
                                                } ,
                                                deactivate: function() {

                                                }

                                            }

                                        });

                                        fil.show();
                                        ser.hide();


                                    }
                                }


                            }]
                        });

                                ser.show();

                        }
                        }]);

                            } ,
                    deactivate: function() {
                    },
                    leafitemtap: function(nestedList, list, index, target, record) {
                        //Ext.getCmp('serch').destroy();
                        cat = record.get('code');
                        var catdyn = cat;
                        var favestore = Ext.create("Ext.data.Store", {
                        model: "Favorite",defaultRootProperty: 'items',
                        storeId: 'Favorite',
                        proxy: {
                            type: 'localstorage'
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

                                if(typeof Ext.getCmp('serch')!='undefined'){
                                    //alert('fu');
                                    Ext.getCmp('serch').hide();
                                }

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
                                                treestore.getBackButton().show();
                                            }}]);
                                            flist.hide();
                                            button.hide();
                                            var favestore = Ext.create("Ext.data.Store", {
                                            model: "Favorite",defaultRootProperty: 'items',
                                            storeId: 'Favorite',
                                            proxy: {
                                                type: 'localstorage'
                                                //type: "sql"
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
                                                        did = record.raw.name;
                                                        console.log(record.raw);

                                                        var ditem = favestore.findRecord('name',did);
                                                        console.log(ditem);
                                                        favestore.remove(ditem);
                                                        myConfirm('сообщение ', alert);

                                                        function myConfirm(msg, func){
                                                            var div=document.createElement('div');
                                                            div.style.cssText="text-align:center;padding:10px;position:fixed;width:200px;height:40px;bottom:50%;right:50%;margin-right:-100px;margin-bottom:-20px;border:1px dotted #000"
                                                            div.onclick=function(e){
                                                                var t=e?e.target:window.event.srcElement;
                                                                if(t.tagName=='INPUT'){
                                                                    t.value=='Обновить'&&func('да');
                                                                    this.parentNode.removeChild(this)
                                                                }
                                                            }
                                                            div.innerHTML="<div style='margin-top: -100px; margin-left: -50px; width: 320px; height: 155px; position:absolute; z-index: 10000; background: url(./img/error_wind.png) top center no-repeat;'><p style='color: #fff; font: 24px Hlvl; text-align: center; padding: 85px 0 33px;'>Удалено</p><input class='x-msgbox-buttons x-add' type='button' value='Ок'></div>";

                                                            return document.body.appendChild(div);
                                                        }

                                                        favestore.sync();

                                                              record.destroy();

                                                    }

                                                    }
                                            });
                                                fd = (flist1.getHeader());
                                                fd.destroy();

                                                flist1.show();
                                                treestore.getBackButton().hide();

                                    }
                                    }
                                    ]
                                    );

                               },
                                itemtap:function(h, index, target, record, e, eOpts ){
                                    //nestedList.setDetailCard(fil);
                                    Ext.getCmp('ed').hide();
                                    var catdyn = record.raw.ftype;
                                    var f_cid = record.raw.fid;

                                    fil = Ext.create('Ext.Container', {
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

                                                    html : '<div style="background: url(http://now-yakutsk.stairwaysoft.net/mobile/img/'+ record.raw.banner+') !important; float: left; width: 100%; margin-top-top: 100px; height: 224px !important;"></div>'

                                                }
                                            ]

                                        },
                                            {
                                                xtype : 'panel',
                                                height: '120px',
                                                html: '<div class="comp-location"><span class="locate"><i>'+record.raw.adress+'</i><b>'+record.phone+'</b></span><a href="">'+record.raw.site+'</a></div>'//+hinsert  // +'<div class="inside-h"><span class="h4">'+post.get('special')+'</span></div>'
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


                                        ]

                                    });
                                    flist.hide();
                                    fil.show();
                               },
                               deactivate: function(button){
                                //tb.show();
                                tb.setTitle('<div class="titleimg"></div>'),
                                //Ext.getCmp('serch').show();
                                Ext.getCmp('ed').hide();
                                   Ext.getCmp('serch').show();
                                   flist.destroy();

                                   if(typeof(fil)!= 'undefined'){
                                       fil.destroy();
                                   }


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
                                                        s_image = post.get('image');
                                                        cfid = post.get('cid');
                                                        cat1 = record.get('code');
                                                        banner = post.get('banner');
                                                        site = post.get('site');
                                                        adress = post.get('adress');
                                                        phone = post.get('phone');
                                                        ds_name = post.get('list');
                                                        ditem = favestore.findRecord('name',ds_name);
                                                        if (typeof ttt != 'undefined'){

                                                        }
                                                        else{
                                                            ttt = (tb2.insert(3,[ {xtype:'spacer'},{align:'right', xtype:'button', id: 'fs_id',
                                                                handler: function(button){
                                                                    if(ditem!= null)
                                                                    {
                                                                        favestore.remove(ditem);
                                                                    }
                                                                    else
                                                                    {
                                                                        favestore.add([{
                                                                            name: ds_name,
                                                                            ftype: cat1,
                                                                            image: s_image,
                                                                            site: site,
                                                                            banner: banner,
                                                                            adress: adress,
                                                                            phone: phone,
                                                                            fid : cfid
                                                                        }]);
                                                                        myConfirm('сообщение ', alert);

                                                                        function myConfirm(msg, func){
                                                                            var div=document.createElement('div');
                                                                            div.style.cssText="text-align:center;padding:10px;position:fixed;width:200px;height:40px;bottom:50%;right:50%;margin-right:-100px;margin-bottom:-20px;border:1px dotted #000"
                                                                            div.onclick=function(e){
                                                                                var t=e?e.target:window.event.srcElement;
                                                                                if(t.tagName=='INPUT'){
                                                                                    t.value=='Обновить'&&func('да');
                                                                                    this.parentNode.removeChild(this)
                                                                                }
                                                                            }
                                                                            div.innerHTML="<div style='margin-top: -100px; margin-left: -50px; width: 320px; height: 155px; position:absolute; z-index: 10000; background: url(./img/error_wind.png) top center no-repeat;'><p style='color: #fff; font: 24px Hlvl; text-align: center; padding: 85px 0 33px;'>Добавлено</p><input class='x-msgbox-buttons x-add' type='button' value='Ок'></div>";

                                                                            return document.body.appendChild(div);
                                                                        }
                                                                    }
                                                                    favestore.sync();
                                                                    delete window.ditem;


                                                                    //adding to favorite
                                                                    /*db.transaction(function(tx) {
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
                                                                                        site: site,
                                                                                        banner: banner,
                                                                                        adress: adress,
                                                                                        phone:phone,
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
                                                                                    site: site,
                                                                                    banner: banner,
                                                                                    adress: adress,
                                                                                    phone:phone,
                                                                                    fid : cfid

                                                                                }]);
                                                                                favestore.sync();
                                                                            }
                                                                        )});*/

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
                                    defaultBackButtonText : null,
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
                                                items: [
                                                    {
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
                                                        detailCard: {
                                                            xtype: 'panel',
                                                           // scrollable: true,
                                                            styleHtmlContent: true
                                                        },
                                                        listeners: {
                                                        activate : function() {
                                                            s_image = post.get('image');
                                                            cfid = post.get('cid');
                                                            cat1 = record.get('code');
                                                            banner = post.get('banner');
                                                            site = post.get('site');
                                                            adress = post.get('adress');
                                                            phone = post.get('phone');
                                                            ds_name = post.get('list');
                                                            ditem = favestore.findRecord('name',ds_name);

                                                            if (typeof ttt != 'undefined'){

                                                            }
                                                            else{
                                                                ttt = (tb2.insert(3,[ {xtype:'spacer'},{align:'right', xtype:'button', id: 'fs_id',
                                                                    handler: function(){
                                                                        if(ditem!= null)
                                                                        {
                                                                            favestore.remove(ditem);
                                                                        }
                                                                        else
                                                                        {
                                                                            favestore.add([{
                                                                                name: ds_name,
                                                                                ftype: cat1,
                                                                                image: s_image,
                                                                                site: site,
                                                                                banner: banner,
                                                                                adress: adress,
                                                                                phone: phone,
                                                                                fid : cfid
                                                                            }]);

                                                                        }
                                                                        favestore.sync();
                                                                            delete window.ditem;
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
                                            updateTitleText :false,
                                            useTitleAsBackText: false,
                                            defaultBackButtonText : null,
                                            backText: '<div class="backtext"></div>',
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
                                                updateTitleText:false,
                                                useTitleAsBackText: false,
                                                defaultBackButtonText : null,
                                                backText: '<div class="backtext"></div>',
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
                                                                                   html : '<div style="background: url(http://now-yakutsk.stairwaysoft.net/mobile/img/'+ post.get('banner')+') !important; float: left; width: 100%; margin-top-top: 100px; height: 224px !important;"></div>'
                                                                               } /*,
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
                                                                        'name','image','id','filmpage','scat',
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
                                                            s_image = post.get('image');
                                                            cfid = post.get('cid');
                                                            cat1 = record.get('code');
                                                            banner = post.get('banner');
                                                            site = post.get('site');
                                                            adress = post.get('adress');
                                                            phone = post.get('phone');
                                                            ds_name = post.get('list');
                                                            ditem = favestore.findRecord('name',ds_name);
                                                            if (typeof ttt != 'undefined'){
                                                            }
                                                            else{
                                                                ttt = (tb2.insert(3,[ {xtype:'spacer'},{align:'right', xtype:'button', id: 'fs_id',
                                                                    handler: function(){
                                                                        //console.log(ditem);
                                                                        if(ditem!= null)
                                                                        {
                                                                            favestore.remove(ditem);
                                                                        }
                                                                        else
                                                                        {
                                                                            favestore.add([{
                                                                                name: ds_name,
                                                                                ftype: cat1,
                                                                                image: s_image,
                                                                                site: site,
                                                                                banner: banner,
                                                                                adress: adress,
                                                                                phone: phone,
                                                                                fid : cfid
                                                                            }]);
                                                                            myConfirm('сообщение ', alert);

                                                                            function myConfirm(msg, func){
                                                                                var div=document.createElement('div');
                                                                                div.style.cssText="text-align:center;padding:10px;position:fixed;width:200px;height:40px;bottom:50%;right:50%;margin-right:-100px;margin-bottom:-20px;border:1px dotted #000"
                                                                                div.onclick=function(e){
                                                                                    var t=e?e.target:window.event.srcElement;
                                                                                    if(t.tagName=='INPUT'){
                                                                                        t.value=='Обновить'&&func('да');
                                                                                        this.parentNode.removeChild(this)
                                                                                    }
                                                                                }
                                                                                div.innerHTML="<div style='margin-top: -100px; margin-left: -50px; width: 320px; height: 155px; position:absolute; z-index: 10000; background: url(./img/error_wind.png) top center no-repeat;'><p style='color: #fff; font: 24px Hlvl; text-align: center; padding: 85px 0 33px;'>Добавлено</p><input class='x-msgbox-buttons x-add' type='button' value='Ок'></div>";

                                                                                return document.body.appendChild(div);
                                                                            }
                                                                        }
                                                                        favestore.sync();
                                                                        delete window.ditem;
                                                                        //adding to favorite
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
                                                                    store: search,
                                                                    listeners:{
                                                                        itemtap:function(h, index, target, record, e, eOpts ){
                                                                            f_cid = record.get('cid');
                                                                            catdyn = record.get('scat');
                                                                            // ser.hide();
                                                                            var fil = Ext.create('Ext.Container', {
                                                                                fullscreen: true,
                                                                                layout: 'vbox',
                                                                                items:[{
                                                                                    xtype:'toolbar',
                                                                                    docked:'top',
                                                                                    title: record.get('name'),
                                                                                    items: [{
                                                                                        ui: 'back',
                                                                                        xtype: 'button',
                                                                                        id: 'sback',
                                                                                        handler: function (button) {

                                                                                            fil.destroy();
                                                                                            ser.show();
                                                                                            }

                                                                                    },
                                                                                        {xtype: 'carousel',
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
                                                                                                    html : '<div style="background: url(http://now-yakutsk.stairwaysoft.net/mobile/img/'+ record.get('banner')+') !important; float: left; width: 100%; margin-top-top: 100px; height: 224px !important;"></div>'

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
                                                                                            // height: '120px',
                                                                                            html: '<div class="comp-location"><span class="locate"><i>'+record.get('adress')+'</i><b>'+record.get('phone')+'</b></span><a href="">'+record.get('site')+'</a><div>'

                                                                                        },

                                                                                        {
                                                                                            //scrollable:'vertical',
                                                                                            flex: 1,
                                                                                            useToolbar:true,
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
                                                                                    ]
                                                                                }],
                                                                                detailCard: {
                                                                                    xtype: 'panel',
                                                                                    // scrollable: true,
                                                                                    styleHtmlContent: true
                                                                                },
                                                                                listeners: {
                                                                                    activate : function() {
                                                                                        s_image = post.get('image');
                                                                                        cfid = post.get('cid');
                                                                                        cat1 = record.get('code');
                                                                                        banner = post.get('banner');
                                                                                        site = post.get('site');
                                                                                        adress = post.get('adress');
                                                                                        phone = post.get('phone');
                                                                                        ds_name = post.get('list');
                                                                                        ditem = favestore.findRecord('name',ds_name);
                                                                                        if (typeof ttt != 'undefined'){

                                                                                        }
                                                                                        else{
                                                                                            ttt = (tb2.insert(3,[ {xtype:'spacer'},{align:'right', xtype:'button', id: 'fs_id',
                                                                                                handler: function(){
                                                                                                    if(ditem!= null)
                                                                                                    {
                                                                                                        favestore.remove(ditem);
                                                                                                    }
                                                                                                    else
                                                                                                    {
                                                                                                        favestore.add([{
                                                                                                            name: ds_name,
                                                                                                            ftype: cat1,
                                                                                                            image: s_image,
                                                                                                            site: site,
                                                                                                            banner: banner,
                                                                                                            adress: adress,
                                                                                                            phone: phone,
                                                                                                            fid : cfid
                                                                                                        }]);
                                                                                                        myConfirm('сообщение ', alert);

                                                                                                        function myConfirm(msg, func){
                                                                                                            var div=document.createElement('div');
                                                                                                            div.style.cssText="text-align:center;padding:10px;position:fixed;width:200px;height:40px;bottom:50%;right:50%;margin-right:-100px;margin-bottom:-20px;border:1px dotted #000"
                                                                                                            div.onclick=function(e){
                                                                                                                var t=e?e.target:window.event.srcElement;
                                                                                                                if(t.tagName=='INPUT'){
                                                                                                                    t.value=='Обновить'&&func('да');
                                                                                                                    this.parentNode.removeChild(this)
                                                                                                                }
                                                                                                            }
                                                                                                            div.innerHTML="<div style='margin-top: -100px; margin-left: -50px; width: 320px; height: 155px; position:absolute; z-index: 10000; background: url(./img/error_wind.png) top center no-repeat;'><p style='color: #fff; font: 24px Hlvl; text-align: center; padding: 85px 0 33px;'>Добавлено</p><input class='x-msgbox-buttons x-add' type='button' value='Ок'></div>";

                                                                                                            return document.body.appendChild(div);
                                                                                                        }
                                                                                                    }
                                                                                                    favestore.sync();
                                                                                                    delete window.ditem;

                                                                                                }

                                                                                            }]));

                                                                                        }


                                                                                        //tb.hide();
                                                                                        //tb2.show();
                                                                                    } ,
                                                                                    deactivate: function() {
                                                                                    }
                                                                                }
                                                                            });
                                                                            fil.show();
                                                                            ser.hide();
                                                                            tb1.hide();
                                                                        }
                                                                    }


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
                                 Ext.getCmp('serch').hide();
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
                                                                        //xtype: 'carousel',
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
                                                                            defaultType: 'carousel',
                                                                           items: [
                                                                                {

                                                                                      html : '<div style="background: url(http://now-yakutsk.stairwaysoft.net/mobile/img/'+ post.get('banner')+') !important; float: left; width: 100%; margin-top-top: 100px; height: 224px !important;"></div>'
                                                                                    //style: 'width: 100%; margin-top-top: 100px; height: 134px !important;float:left; background:   url(http://now-yakutsk.stairwaysoft.net/mobile/img/'+ post.get('banner')+');'
                                                                                },
                                                                                {
                                                                                    html : 'А здесь второй',
                                                                                    style: 'background-color: #759E60; float:left; '
                                                                                }/*,
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
                                                                        'name','image','id','filmpage','scat',
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
                                                                            s_image = post.get('image');
                                                                            cfid = post.get('cid');
                                                                            cat1 = record.get('code');
                                                                            banner = post.get('banner');
                                                                            site = post.get('site');
                                                                            adress = post.get('adress');
                                                                            phone = post.get('phone');
                                                                            ds_name = post.get('list');
                                                                            ditem = favestore.findRecord('name',ds_name);

                                                                            if (typeof ttt != 'undefined'){

                                                                            }
                                                                            else{
                                                                            ttt = (tb2.insert(3,[ {xtype:'spacer'},{align:'right', xtype:'button', id: 'fs_id',
                                                                            handler: function(){
                                                                                //console.log(ditem);
                                                                                if(ditem!= null)
                                                                                {
                                                                                    favestore.remove(ditem);
                                                                                }
                                                                                else
                                                                                {
                                                                                    favestore.add([{
                                                                                        name: ds_name,
                                                                                        ftype: cat1,
                                                                                        image: s_image,
                                                                                        site: site,
                                                                                        banner: banner,
                                                                                        adress: adress,
                                                                                        phone: phone,
                                                                                        fid : cfid
                                                                                    }]);
                                                                                    myConfirm('сообщение ', alert);

                                                                                    function myConfirm(msg, func){
                                                                                        var div=document.createElement('div');
                                                                                        div.style.cssText="text-align:center;padding:10px;position:fixed;width:200px;height:40px;bottom:50%;right:50%;margin-right:-100px;margin-bottom:-20px;border:1px dotted #000"
                                                                                        div.onclick=function(e){
                                                                                            var t=e?e.target:window.event.srcElement;
                                                                                            if(t.tagName=='INPUT'){
                                                                                                t.value=='Обновить'&&func('да');
                                                                                                this.parentNode.removeChild(this)
                                                                                            }
                                                                                        }
                                                                                        div.innerHTML="<div style='margin-top: -100px; margin-left: -50px; width: 320px; height: 155px; position:absolute; z-index: 10000; background: url(./img/error_wind.png) top center no-repeat;'><p style='color: #fff; font: 24px Hlvl; text-align: center; padding: 85px 0 33px;'>Добавлено</p><input class='x-msgbox-buttons x-add' type='button' value='Ок'></div>";

                                                                                        return document.body.appendChild(div);
                                                                                    }
                                                                                }
                                                                                 favestore.sync();
                                                                                 delete window.ditem;
                                                                                //adding to favorite
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

Ext.override(Ext.Panel, {
    afterRender: Ext.Function.createSequence(function() {

            this._getIScrollElement = function() {
                return (this.el.child('.x-body', true));
            }

        //Uncomment below to use iScroll only on mobile devices but use regular scrolling on PCs.
        if (this.autoScroll /*&& Ext.isMobileDevice*/) {
            if (this._getIScrollElement) {
                this._updateIScroll();
                this.on('afterlayout', this._updateIScroll);
            }
        }
    }),

    _ensureIScroll: function() {
        if (!this.iScroll) {
            var el = this._getIScrollElement();
            if (el.children.length > 0) {
                this.iScroll = new iScroll(el);
                this.iScrollTask = new Ext.util.DelayedTask(this._refreshIScroll, this);
            }
        }
    },

    _updateIScroll: function() {
        this._ensureIScroll();
        if (this.iScroll) {
            this.iScrollTask.delay(1000);
        }
    },

    _refreshIScroll: function() {
        this.iScroll.refresh();
        //Refresh one more time.
        this.iScrollTask.delay(1000);
    }
});

Ext.override(Ext.NestedList, {
    _getIScrollElement: function() {
        return (this.el.child('.x-body', true));
    }
});

Ext.override(Ext.TabPanel, {
    _getIScrollElement: function() {
        return (this.el.child('.x-body', true));
    },

    afterRender: Ext.Function.createSequence(function() {
        //TODO: need to hook into more events and to update iScroll.
        this.view.on('refresh', this._updateIScroll, this);
    })
});