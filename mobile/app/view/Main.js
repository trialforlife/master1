Ext.define('ListItem', {

    extend: 'Ext.data.Model',
    config: {
        fields: ['text']
    },
});

 /*      var cin =  Ext.create("Ext.tab.Panel", {
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
        });
*/
        

var treeStore = Ext.create('Ext.data.TreeStore', {
    model: 'ListItem',
    defaultRootProperty: 'items',


    control :{itemtap: 'onListItemTap'}, 

    root: {
        items: [
            {
                text: 'Афиша',
                items: [
                    {
                        text: 'Кино',
                        leaf: true ,

                    },
                    {
                        text: 'Театры',
                        leaf: true ,
                    },
                    {
                        text: 'Городские мероприятия',
                        leaf: true ,
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


});
 
Ext.create('Ext.NestedList', {
    fullscreen: true,
    store: treeStore,
    detailCard: {   
    //    html: 'You are viewing the detail card!'
    },
    listeners: {
    leafitemtap: function(nestedList, list, index, target, record) {

        var cin = Ext.create("Ext.tab.Panel", {
            fullscreen: true,
            tabBarPosition: 'bottom',
 
            

                items: [
                {   
                    xtype: 'nestedlist',
                    //title: 'Blog',
                    iconCls: 'star',
                    displayField: 'list',
 
                    store: {
                        type: 'tree',
 
                        fields: [
                            'name', 'link', 'list', 'contentSnippet', 'adress',
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
        });
        
       
        var detailCard = nestedList.getDetailCard();
        var cat = (record.get('text'));

        switch (cat) {
           case "Кино":
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