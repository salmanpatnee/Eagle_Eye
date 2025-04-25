document.getElementById("print").addEventListener("click", async () => {
    const button = document.getElementById("print");
    const fileName = button.getAttribute("data-filename") || "dashboard.pdf";
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

// document.getElementById('printPpt').addEventListener('click', function () {
//     html2canvas(document.getElementById('print-area')).then(function (canvas) {
//         // Convert the canvas to image
//         const imgData = canvas.toDataURL('image/png');
        
        
//         // Send the image data to Laravel to generate PowerPoint
//         fetch('/generate-ppt-with-chart', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//             },
//             body: JSON.stringify({ image: imgData })
//         })
//         .then(response => response.blob())
//         .then(blob => {
//             // Download the PowerPoint file
//             const link = document.createElement('a');
//             link.href = URL.createObjectURL(blob);
//             link.download = 'presentation.pptx';
//             link.click();
//         });
//     });
// });