Ext.define('ListItem', {
    extend: 'Ext.data.Model',
    config: {
        fields: ['text']
    }
});
       /*var cin =  Ext.create("Ext.tab.Panel", {
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
                            'name', 'link', 'author', 'contentSnippet', 'adress',
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
                        }
                    }
                }
            ]
        });*/

        
 
var treeStore = Ext.create('Ext.data.TreeStore', {
    model: 'ListItem',
    defaultRootProperty: 'items',
    root: {
        items: [
            {
                text: 'Афиша',
                items: [
                    {
                        text: 'Кино',
                        
                             items: [
                                {
                                    xtype: 'nestedlist',
                                    title: 'Blog',
                                    iconCls: 'star',
                                    displayField: 'name',
                                    store: {
                                        type: 'tree',
                 
                                        fields: [
                                            'name', 'link', 'author', 'contentSnippet', 'adress',
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
                                            //this.getDetailCard().setHtml(post.get('adress'));
                                            alert("paleg4e");
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
                                                            'name', 'link', 'author', 'contentSnippet', 'adress',
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
                                                        }
                                                    }
                }
            ]
        })

                                        }
                                    }
                }
            ]
       
                    },
                    {
                        text: 'Театры',
                        items: [
                            { text: 'Still', leaf: true },
                            { text: 'Sparkling', leaf: true }
                        ]
                    },
                    {
                        text: 'Городские мероприятия',
                        items: [
                            { text: 'Still', leaf: true },
                            { text: 'Sparkling', leaf: true }
                        ]
                    },
                ]
            },
            {
                text: 'Рестораны',
                items: [
                    { text: 'Nuts', leaf: true },
                    { text: 'Pretzels', leaf: true },
                    { text: 'Wasabi Peas', leaf: true  }
                ]
            }
            ,
                        {
                text: 'Ночная жизнь',
                items: [
                    { text: 'Nuts', leaf: true },
                    { text: 'Pretzels', leaf: true },
                    { text: 'Wasabi Peas', leaf: true  }
                ]
            },
                        {
                text: 'Доставка',
                items: [
                    { text: 'Nuts', leaf: true },
                    { text: 'Pretzels', leaf: true },
                    { text: 'Wasabi Peas', leaf: true  }
                ]
            },
                        {
                text: 'Развлечения',
                items: [
                    { text: 'Nuts', leaf: true },
                    { text: 'Pretzels', leaf: true },
                    { text: 'Wasabi Peas', leaf: true  }
                ]
            },
                        {
                text: 'Избранное',
                items: [
                    { text: 'Nuts', leaf: true },
                    { text: 'Pretzels', leaf: true },
                    { text: 'Wasabi Peas', leaf: true  }
                ]
            },
                        {
                text: 'О нас',
                items: [
                    { text: 'Nuts', leaf: true },
                    { text: 'Pretzels', leaf: true },
                    { text: 'Wasabi Peas', leaf: true  }
                ]
            }

        ]
    }
    ,

    tap: function(e, node) {
        var string = '';

        string += 'You tapped at: <strong>{ x: ' + e.pageX + ', y: ' + e.pageY + ' }</strong> <i>(e.pageX & e.pageY)</i>';
        string += '<hr />';
        string += 'The HTMLElement you tapped has the className of: <strong>' + e.target.className + '</strong> <i>(e.target)</i>';
        string += '<hr />';
        string += 'The HTMLElement which has the listener has a className of: <strong>' + e.getTarget().className + '</strong> <i>(e.getTarget())</i>';

        Ext.getCmp('logger').setHtml(string);
    }
});
 
Ext.create('Ext.NestedList', {
    fullscreen: true,
    store: treeStore
});