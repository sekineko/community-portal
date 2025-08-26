// PDF.js library (from Mozilla)
document.addEventListener('DOMContentLoaded', function () {
    // Make sure PDF.js is loaded
    if (typeof pdfjsLib === 'undefined') {
        console.error('PDF.js library not loaded!');
        return;
    }

    // Set the worker source to use the CDN version
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

    // Initialize thumbnails
    initPDFThumbnails();

    // Watch for Alpine.js x-show changes to initialize thumbnails when notices are expanded
    setupMutationObserver();
});

// Set up a mutation observer to detect when notices are expanded
function setupMutationObserver() {
    // Create a mutation observer to watch for DOM changes
    const observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'style') {
                // Check if this is a notice being expanded (style changing from display:none to display:block)
                if (mutation.target.style.display === 'block' && mutation.target.querySelector('.pdf-thumbnail')) {
                    // Initialize any PDF thumbnails in this expanded section
                    const thumbnails = mutation.target.querySelectorAll('.pdf-thumbnail');
                    thumbnails.forEach(function (thumbnail) {
                        const pdfUrl = thumbnail.getAttribute('data-pdf-url');
                        const canvasId = thumbnail.getAttribute('id');
                        if (pdfUrl && canvasId && !thumbnail.hasAttribute('data-initialized')) {
                            renderPDFThumbnail(pdfUrl, canvasId);
                            thumbnail.setAttribute('data-initialized', 'true');
                        }
                    });
                }
            }
        });
    });

    // Start observing all elements that might contain PDF thumbnails
    const containers = document.querySelectorAll('[x-show]');
    containers.forEach(function (container) {
        observer.observe(container, { attributes: true });
    });
}

// Function to render PDF thumbnail
function renderPDFThumbnail(pdfUrl, canvasId) {
    // Loading PDF document
    const loadingTask = pdfjsLib.getDocument(pdfUrl);

    loadingTask.promise.then(function (pdf) {
        // Get the first page
        pdf.getPage(1).then(function (page) {
            const canvas = document.getElementById(canvasId);
            const context = canvas.getContext('2d');

            // PDF page size
            const viewport = page.getViewport({ scale: 0.5 });

            // Set canvas dimensions to match the PDF page
            canvas.width = viewport.width;
            canvas.height = viewport.height;

            // Render PDF page into canvas context
            const renderContext = {
                canvasContext: context,
                viewport: viewport
            };

            page.render(renderContext);
        });
    }).catch(function (error) {
        console.error('Error rendering PDF thumbnail:', error);
        // Show error placeholder
        const canvas = document.getElementById(canvasId);
        if (canvas) {
            const context = canvas.getContext('2d');
            context.fillStyle = '#f8f9fa';
            context.fillRect(0, 0, canvas.width, canvas.height);
            context.fillStyle = '#dc3545';
            context.font = '14px Arial';
            context.textAlign = 'center';
            context.fillText('PDF読み込みエラー', canvas.width / 2, canvas.height / 2);
        }
    });
}

// Initialize all PDF thumbnails on the page
function initPDFThumbnails() {
    const thumbnails = document.querySelectorAll('.pdf-thumbnail');
    thumbnails.forEach(function (thumbnail) {
        const pdfUrl = thumbnail.getAttribute('data-pdf-url');
        const canvasId = thumbnail.getAttribute('id');
        if (pdfUrl && canvasId) {
            renderPDFThumbnail(pdfUrl, canvasId);
        }
    });
}
