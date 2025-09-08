const printButton = document.getElementById("print");
if (printButton) {
    printButton.addEventListener("click", async () => {
        const button = printButton;
        const fileName =
            button.getAttribute("data-filename") || "dashboard.pdf";
        const container = document.getElementById("print-area");

        // Use html2canvas to capture the content as an image
        const canvas = await html2canvas(container, {
            scale: 2, // Increase resolution
            useCORS: true, // Enable cross-origin images
        });

        const imgData = canvas.toDataURL("image/png"); // Convert canvas to image
        const pdf = new jspdf.jsPDF("p", "mm", "a4"); // Create a new PDF document

        const pageWidth = pdf.internal.pageSize.getWidth(); // PDF page width
        const pageHeight = pdf.internal.pageSize.getHeight(); // PDF page height
        const imgWidth = pageWidth;
        const imgHeight = (canvas.height * imgWidth) / canvas.width;

        if (imgHeight > pageHeight) {
            // Handle multi-page case
            let yPosition = 0;
            while (yPosition < imgHeight) {
                pdf.addImage(
                    imgData,
                    "PNG",
                    0,
                    yPosition > 0 ? 0 : yPosition,
                    imgWidth,
                    imgHeight
                );
                yPosition += pageHeight;
                if (yPosition < imgHeight) pdf.addPage();
            }
        } else {
            // Single page
            pdf.addImage(imgData, "PNG", 0, 0, imgWidth, imgHeight);
        }

        pdf.save(`${fileName}.pdf`); // Download the PDF with the filename from the button's data attribute
    });
}

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
