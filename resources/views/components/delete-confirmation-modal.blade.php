<!-- Delete Confirmation Modal -->
<div id="deleteConfirmationModal" class="dmodal">
    <div class="dmodal-content">
        <div class="dmodal-header">
            <h3 class="dmodal-title">Confirm Delete</h3>
        </div>
        <div class="dmodal-body">
            <p>Are you sure you want to delete this item?</p>
        </div>
        <div class="dmodal-footer">
            <button type="button" class="dmodal-btn cancel-btn">Cancel</button>
            <button type="button" class="dmodal-btn delete-btn">Yes, Delete</button>
        </div>
    </div>
</div>

<style>
    .dmodal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .dmodal.show {
        display: flex !important;
        align-items: center;
        justify-content: center;
        opacity: 1;
    }

    .dmodal-content {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 90%;
        max-width: 400px;
        overflow: hidden;
    }

    .dmodal-header {
        padding: 16px 20px;
        border-bottom: 1px solid #eee;
        background-color: #2E74B6;
    }

    .dmodal-title {
        margin: 0;
        font-size: 1.25rem !important;
        color: #fff;
    }

    .dmodal-body {
        padding: 20px;
        color: #666;
    }

    .dmodal-footer {
        padding: 16px 20px;
        border-top: 1px solid #eee;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    .dmodal-btn {
        padding: 8px 16px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        font-weight: 500;
        transition: background-color 0.2s ease;
    }

    .cancel-btn {
        background-color: #f0f0f0;
        color: #333;
    }

    .cancel-btn:hover {
        background-color: #e0e0e0;
    }

    .delete-btn {
        background-color: #dc3545;
        color: white;
    }

    .delete-btn:hover {
        background-color: #c82333;
    }
</style>

<script>
    class DeleteConfirmationModal {
        constructor() {
            this.dmodal = document.getElementById('deleteConfirmationModal');
            this.cancelBtn = this.dmodal.querySelector('.cancel-btn');
            this.deleteBtn = this.dmodal.querySelector('.delete-btn');
            this.form = null;
            this.callback = null;

            this.cancelBtn.addEventListener('click', () => this.hide());
            this.deleteBtn.addEventListener('click', () => this.confirmDelete());
        }

        show(form, callback = null) {
           
            
            this.form = form;
            this.callback = callback;
            this.dmodal.classList.add('show');
        }

        hide() {
            this.dmodal.classList.remove('show');
            this.form = null;
            this.callback = null;
        }

        confirmDelete() {
           
            
            if (this.form) {
                this.form.submit();
            } else if (this.callback) {
                this.callback();
            }
            this.hide();
        }
    }

    // Initialize the dmodal
    document.addEventListener('DOMContentLoaded', () => {
        window.deleteConfirmationModal = new DeleteConfirmationModal();
    });
</script>
