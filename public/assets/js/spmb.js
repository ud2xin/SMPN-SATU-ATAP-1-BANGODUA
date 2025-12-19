function spmbOpenModal(){
    const modal=document.getElementById('spmbImageModal');
    document.getElementById('spmbModalImage').src=document.getElementById('spmbMainImage').src;
    modal.classList.add('spmb-active');
    document.body.style.overflow='hidden'; // Prevent scroll saat modal open
}
function spmbCloseModal(e){
    if(e.target.id==='spmbImageModal'||e.target.classList.contains('spmb-modal-close')){
        const modal=document.getElementById('spmbImageModal');
        modal.style.animation='spmb-fadeInModal 0.3s ease-out reverse';
        setTimeout(()=>{
            modal.classList.remove('spmb-active');
            modal.style.animation='';
            document.body.style.overflow=''; // Restore scroll
        },300);
    }
}