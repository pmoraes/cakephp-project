function sellsByMonth(sells) {
    if (typeof(sells) === 'string') {
        sells = JSON.parse(sells);
    }

    var month = [];
    var values = [];
    
    for (var sell in sells.Sell) {
        month[sell] = sells.Sell[sell].Sell.created;
        values[sell] = parseFloat(sells.Sell[sell][0].total);
    }

    $('#sellsByMonth').highcharts({
        title: {
            text: 'Vendas Mensal',
            x: -20 //center
        },
        subtitle: {
            text: 'Total Vendido Por Mês',
            x: -20
        },
        xAxis: {
            
            categories: month
        },
        tooltip: {
            valuePrefix: 'R$'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Vendas',
            data: values
        }]
    });
}

function sellsByWeek(sells) {
	if (typeof(sells) === 'string') {
        sells = JSON.parse(sells);
    }

    var month = [];
    var values = [];
    
    for (var sell in sells.Sell) {
        month[sell] = sells.Sell[sell].Sell.created;
        values[sell] = parseFloat(sells.Sell[sell][0].total);
    }

    $('#sellsByWeek').highcharts({
        title: {
            text: 'Vendas da última semana',
            x: -20 //center
        },
        subtitle: {
            text: 'Total Vendido',
            x: -20
        },
        xAxis: {
            
            categories: month
        },
        tooltip: {
            valuePrefix: 'R$'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Vendas',
            data: values
        }]
    });
}

function bestProducts(bestProducts) {
    if (typeof(bestProducts) === 'string') {
        bestProducts = JSON.parse(bestProducts);
    }

    var products = [];
    var values = [];
    var i = 0;
    for (var data in bestProducts) {
        products[i] = data;
        values[i] = bestProducts[data];
        i++;
    }

    $('#bestProducts').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Produtos mais vendidos'
        },
        xAxis: {
            categories: products
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total Produtos'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black, 0 0 3px black'
                    }
                }
            }
        },
        series: [{
            name: "Quantidade",
            data: values
        }]
    });
}

function worstProducts(worstProducts) {
    if (typeof(worstProducts) === 'string') {
        worstProducts = JSON.parse(worstProducts);
    }

    var products = [];
    var values = [];
    var i = 0;
    for (var data in worstProducts) {
        products[i] = data;
        values[i] = worstProducts[data];
        i++;
    }

    $('#worstProducts').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Produtos menos vendidos'
        },
        xAxis: {
            categories: products
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total Produtos'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black, 0 0 3px black'
                    }
                }
            }
        },
        series: [{
            name: "Quantidade",
            data: values
        }]
    });
}

function bestClients(clients) {
	if (typeof(clients) === 'string') {
        clients = JSON.parse(clients);
    }

    var products = [];
    var values = [];
    var i = 0;
    for (var data in clients) {
        products[i] = data;
        values[i] = clients[data];
        i++;
    }

    $('#bestClients').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Clientes que mais compraram'
        },
        xAxis: {
            categories: products
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total Produtos'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black, 0 0 3px black'
                    }
                }
            }
        },
        series: [{
            name: "Quantidade",
            data: values
        }]
    });
}

function worstClients(clients) {
	if (typeof(clients) === 'string') {
        clients = JSON.parse(clients);
    }

    var products = [];
    var values = [];
    var i = 0;
    for (var data in clients) {
        products[i] = data;
        values[i] = clients[data];
        i++;
    }

    $('#worstClients').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Clientes que menos compraram'
        },
        xAxis: {
            categories: products
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total Produtos'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black, 0 0 3px black'
                    }
                }
            }
        },
        series: [{
            name: "Quantidade",
            data: values
        }]
    });
}