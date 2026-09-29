const mobileMenu = document.querySelector('.mobile-menu');
const workspaceSidebar = document.querySelector('.workspace-sidebar');
if (mobileMenu && workspaceSidebar) {
    mobileMenu.addEventListener('click', () => {
        workspaceSidebar.classList.toggle('mobile-open');
    });
}

const initDashboard = () => {
    const user = window.App?.user;
    const date = new Date();
    if (!user || !user.username){
        console.warn('no se encontraron los datos del usuario');
        return;
    }
    const nameElement = document.getElementById('profile-name');
    const letterElement = document.getElementById('avatar');
    const actualDate = document.getElementById('actualDate');
    const nameTitle = document.getElementById('nametitle');
    const username = user.username.charAt(0).toUpperCase(0)+user.username.slice(1);
    nameElement.textContent=nameElement ? username : "";
    
    letterElement.textContent= letterElement ? user.username.slice(0,2).toUpperCase() : "";
    
    actualDate.textContent = actualDate ? date.toLocaleDateString('en-EN',{weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'}) : "";
    nameTitle.textContent += username;
};

const initUploadModal = () => {
    const modal = document.getElementById('uploadModal');
    const openButton = document.getElementById('openUploadModal');
    const closeButton = document.getElementById('closeUploadModal');
    const cancelButton = document.getElementById('cancelUpload');
    const overlay = document.getElementById('uploadModalOverlay');

    const form = document.getElementById('uploadForm');
    const fileInput = document.getElementById('fileInput');
    const dropzone = document.getElementById('uploadDropzone');
    const selectFileButton = document.getElementById('selectFileButton');
    const selectedFile = document.getElementById('selectedFile');
    const selectedFileName = document.getElementById('selectedFileName');
    const selectedFileSize = document.getElementById('selectedFileSize');

    const removeSelectedFile = document.getElementById('removeSelectedFile');
    const submitButton = document.getElementById('submitUpload');
    const uploadError = document.getElementById('uploadError');

    openButton.addEventListener('click', openModal);
    closeButton.addEventListener('click', closeModal);
    cancelButton.addEventListener('click', closeModal);
    overlay.addEventListener('click', closeModal);
    selectFileButton.addEventListener('click', () => {
        fileInput.click()
    });
    fileInput.addEventListener('change', (event) => {
        handleFile(fileInput.files[0]);
    });
    removeSelectedFile.addEventListener('click', () => {
        fileInput.value = '';
        resetForm();
    });
    dropzone.addEventListener('dragleave', () => {
        dropzone.classList.remove('dragover');
    });
    

    if (!modal || !openButton) {
        return;
    }
    const openModal = () => {
        modal.classList.add('active');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('modal-open');
    };
    const closeModal = () => {
        modal.classList.remove('active');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');
        resetForm();
    };
    
    const resetForm = () => {
        form.reset();
        selectedFile.classList.add('hidden');
        uploadError.classList.add('hidden');
        uploadError.textContent = '';
        selectedFileName.textContent = '';
        selectedFileSize.textContent = '';

        submitButton.disabled = true;
        dropzone.classList.remove('has-file');
    };
    const handleFile = (file) => {

        if (!file) {return;}

        const maxSize = 100 * 1024 * 1024;

        if (file.size > maxSize) {
            showError(
                'The file exceeds the maximum size of 100 MB.'
            );
            fileInput.value = '';
            return;
        }


        selectedFileName.textContent =
            file.name;

        selectedFileSize.textContent =
            formatFileSize(file.size);

        selectedFile.classList.remove(
            'hidden'
        );

        uploadError.classList.add(
            'hidden'
        );

        submitButton.disabled = false;

        dropzone.classList.add(
            'has-file'
        );
    };

    const showError = (message) => {
        uploadError.textContent = message;
        uploadError.classList.remove('hidden');
    };

    const formatFileSize = (bytes) => {
        if(bytes ===0){
            return '0 bytes';
        }
    }
    const units = [
        'Bytes','KB','MB','GB'
    ];
    
    const index = Math.floor(
        Math.log(bytes) / Math.log(1024)
    )

    return `${(bytes / Math.pow(1024, index)).toFixed(2)} ${units[index]}`;

}

    if(document.readyState === 'loading'){
        document.addEventListener('DOMContentLoaded',initDashboard);
    }else{
        initDashboard();
    }