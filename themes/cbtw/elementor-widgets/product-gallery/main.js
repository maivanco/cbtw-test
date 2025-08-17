jQuery(document).ready(function($){
    $('.sec-list-products select[name="product_sort_by"]').on('change', function(){
        let sort_by = $(this).val();
        let url = window.location.href;

        let new_param = "product_sort_by=" + sort_by;

        // If URL already contains ?, append with & — otherwise with ?
        let separator = url.includes("?") ? "&" : "?";
        let newUrl = url + separator + new_param;
        console.log(newUrl);
        window.location.href = newUrl;
    });
});