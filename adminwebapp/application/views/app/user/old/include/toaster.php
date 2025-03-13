<style>
	/* Base styling for toaster */
.toaster {
    padding: 10px 5px;
    border-radius: 5px;
    position: fixed;
    bottom: 10%;
    left: 50%;
    transform: translateX(-50%);
    font-family: Arial, sans-serif;
    z-index: 9999;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    font-size: 14px;
    display: flex;
    align-items: center;
    width: max-content;
    display: none;
}

/* Success toaster styling */
.toaster.success {
    background-color: #28a745; /* A more vibrant green */
    color: #fff;
    border-left: 5px solid #155724; /* Darker green left border */
    animation: slideIn 0.5s ease-out;
}

/* Error toaster styling */
.toaster.error {
    background-color: #dc3545; /* A more vibrant red */
    color: #fff;
    border-left: 5px solid #721c24; /* Darker red left border */
    animation: slideIn 0.5s ease-out;
}

/* Animation for sliding in */
@keyframes slideIn {
    0% {
        transform: translateX(-50%) translateY(50px);
        opacity: 0;
    }
    100% {
        transform: translateX(-50%) translateY(0);
        opacity: 1;
    }
}

/* Optional icon for success/error toasters */
.toaster.success::before {
    content: '✔'; /* Success icon */
    margin-right: 10px;
    font-weight: bold;
}

.toaster.error::before {
    content: '✖'; /* Error icon */
    margin-right: 10px;
    font-weight: bold;
}

</style>


<div class="toaster"></div>

<script>
	function toaster(message, type) 
	   {
	     var toaster = $('.toaster');
         toaster.removeClass('success error'); 
	     toaster.html(message);
	     toaster.addClass(type);
	     toaster.fadeIn(500);
	     setTimeout(function() {
	       toaster.fadeOut(500);
	     }, 3000);
	   }
</script>