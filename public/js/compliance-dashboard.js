// Helper to create a pie chart
function createPieChart(ctxId, dataObj, url, showZero = false) {
    new Chart(ctxId, {
        type: "pie",
        data: {
            labels: Object.keys(dataObj),
            datasets: [
                {
                    backgroundColor: [
                        "#228B22",
                        "#FF0000",
                        "#FFC107",
                        "#9E9E9E",
                    ],
                    data: Object.values(dataObj),
                },
            ],
        },
        options: {
            title: {
                display: false,
            },
            legend: {
                display: true,
                position: "left",
            },
            plugins: {
                labels: {
                    render: "percentage",
                    showZero: showZero,
                    fontSize: 20,
                    fontColor: "#fff",
                    arc: false,
                    position: "border",
                },
            },
            onClick: function () {
                window.location.href = url;
            },
        },
    });
}

function createBarChart({
    elementId,
    labels,
    data,
    customData = null,
    backgroundColor = "#2196F3",
    xAxisFontSize = 10,
    onClickUrlPrefix = null,
}) {
    new Chart(elementId, {
        type: "bar",
        data: {
            labels,
            datasets: [
                {
                    backgroundColor,
                    data,
                    ...(customData
                        ? {
                              customData,
                          }
                        : {}),
                },
            ],
        },
        options: {
            legend: {
                display: false,
            },
            scales: {
                xAxes: [
                    {
                        ticks: {
                            fontSize: xAxisFontSize,
                            fontColor: "#000",
                            lineHeight: 1.5,
                            padding: 4,
                        },
                    },
                ],
            },
            onClick(event, elements) {
                if (onClickUrlPrefix && elements?.length) {
                    const { _datasetIndex, _index } = elements[0];
                    const value = customData
                        ? this.data.datasets[_datasetIndex].customData[_index]
                        : labels[_index];
                    window.location.href = `${onClickUrlPrefix}/${value}`;
                }
            },
            plugins: {
                labels: {
                    render: "value",
                    fontColor: "#fff",
                    arc: false,
                },
            },
        },
    });
}
