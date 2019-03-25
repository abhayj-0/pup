/*$(document).ready(function() {
       
    $("button[name='newstubtn']").click(function() {
         var domElement = $('<div class="card" style="width: 50rem;"><div class="card-body"><h5 class="card-title">Registration Number</h5><h6 class="card-subtitle mb-2 text-muted">123456</h6><p class="card-text"><form><div class="form-group"><label for="exampleFormControlFile1">Document 1</label><input type="file" class="form-control-file" id="exampleFormControlFile1" name="file1" value=""></div><div class="form-group"><label for="exampleFormControlFile1">Document 2</label><input type="file" class="form-control-file" id="exampleFormControlFile2" name="file2"></div><div class="form-group"><label for="exampleFormControlFile1">Document 3</label><input type="file" class="form-control-file" id="exampleFormControlFile3" name="file3"></div><div class="form-group"><label for="exampleFormControlFile1">Document 4</label><input type="file" class="form-control-file" id="exampleFormControlFile4" name="file4"></div><div class="form-group"><label for="exampleFormControlFile1">Document 5</label><input type="file" class="form-control-file" id="exampleFormControlFile5" name="file5"></div><div class="form-group"><label for="exampleFormControlFile1">Document 6</label><input type="file" class="form-control-file" id="exampleFormControlFile6" name="file6"></div></form></p><a href="#" class="card-link">Check Progress</a></div></div>');
        $(".previously").after(domElement);
    });
    
});*/

function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();