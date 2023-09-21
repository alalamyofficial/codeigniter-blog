    <!-- AlpineJS -->
    <!-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> -->
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <script>
        var chartOne = document.getElementById('chartOne');
        var myChart = new Chart(chartOne, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var chartTwo = document.getElementById('chartTwo');
        var myLineChart = new Chart(chartTwo, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            var table = $('#categories-list').DataTable();
            // Set the order option to descending order
            table.order([0, 'desc']).draw();
        });


    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
    
    <!-- category validation -->
    <script>
        if ($("#add_category").length > 0) {
        $("#add_category").validate({
            rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                maxlength: 60,
                email: true,
            },
            },
            messages: {
            name: {
                required: "Name is required.",
            },
            email: {
                required: "Email is required.",
                email: "It does not seem to be a valid email.",
                maxlength: "The email should be or equal to 60 chars.",
            },
            },
        })
        }
    </script>


    <!-- tag validation -->
    <script>
        if ($("#add_tag").length > 0) {
        $("#add_tag").validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    maxlength: 60,
                    email: true,
                },
                },
                messages: {
                name: {
                    required: "Name is required.",
                },
                email: {
                    required: "Email is required.",
                    email: "It does not seem to be a valid email.",
                    maxlength: "The email should be or equal to 60 chars.",
                },
            },
        })
        }
    </script>

    <!-- tag validation -->
    <script>
        if ($("#add_user").length > 0) {
        $("#add_user").validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    maxlength: 60,
                    email: true,
                },
                },
                messages: {
                name: {
                    required: "Name is required.",
                },
                email: {
                    required: "Email is required.",
                    email: "It does not seem to be a valid email.",
                    maxlength: "The email should be or equal to 60 chars.",
                },
            },
        })
        }
    </script>

    <!-- post validation -->
    <script>
        if ($("#add_post").length > 0) {
        $("#add_post").validate({
            rules: {
                title: {
                    required: true,
                },
                email: {
                    required: true,
                    maxlength: 60,
                    email: true,
                },
                },
                messages: {
                title: {
                    required: "Title is required.",
                },
                email: {
                    required: "Email is required.",
                    email: "It does not seem to be a valid email.",
                    maxlength: "The email should be or equal to 60 chars.",
                },
            },
        })
        }
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.js" integrity="sha512-P3/SDm/poyPMRBbZ4chns8St8nky2t8aeG09fRjunEaKMNEDKjK3BuAstmLKqM7f6L1j0JBYcIRL4h2G6K6Lew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.min.js" integrity="sha512-ifx27fvbS52NmHNCt7sffYPtKIvIzYo38dILIVHQ9am5XGDQ2QjSXGfUZ54Bs3AXdVi7HaItdhAtdhKz8fOFrA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<!-- <script src="node_modules/quill/dist/quill.min.js"></script> -->

<script src="https://cdn.tiny.cloud/1/hsblu0xmouvkkdx14zshleddizy6m0ybjfboidilbkism1eb/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<!-- <script>
  document.addEventListener('turbolinks:load', function() {
    // Initialize or refresh TinyMCE here
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  });
</script> -->

<script>
  document.addEventListener('turbolinks:load', function() {


    //belong to tinemce editor  


    var script = document.createElement('script');
    script.src = 'https://cdn.tiny.cloud/1/hsblu0xmouvkkdx14zshleddizy6m0ybjfboidilbkism1eb/tinymce/6/tinymce.min.js';
    script.onload = function() {
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            images_upload_url: 'http://localhost:8080//admin/upload/uploadImage',
            images_upload_handler: function(blobInfo, success, failure) {
                var xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', 'http://localhost:8080//admin/upload/uploadImage'); // Update the URL to your server-side endpoint

                xhr.onload = function() {
                    if (xhr.status !== 200) {
                        handleFailure('HTTP: ' + xhr.status);
                        return;
                    }

                    try {
                        if (xhr.responseText.trim() === "") {
                            handleFailure('Empty response received');
                            return;
                        }

                        var response = JSON.parse(xhr.responseText);

                        if (!response || typeof response.url !== 'string') {
                            handleFailure('Invalid JSON: ' + xhr.responseText);
                            return;
                        }

                        success(response.url);
                    } catch (error) {
                        handleFailure('Error occurred while parsing: ' + error);
                    }
                };

                xhr.onerror = function() {
                    handleFailure('Error occurred during the XMLHttpRequest');
                };

                var handleFailure = function(errorMessage) {
                    if (typeof failure === 'function') {
                        failure(errorMessage);
                    } else {
                        console.error(errorMessage);
                    }
                };

                var formData = new FormData();
                formData.append('image', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            }
        }).then(function() {
            // Your code to be executed after the initialization of TinyMCE
            // For example, you can perform operations on the editor instances here
        });
    };

    document.head.appendChild(script);












    //belongs to Tags 
    const tagsList = document.getElementById("tags-list");
    const tagInput = document.getElementById("tag-input");
    const hiddenTagsInput = document.getElementById("hidden-tags-input");
    let tags = [];
    
    function addTag(tag) {
        const li = document.createElement("li");
        li.textContent = tag;
        tagsList.appendChild(li);
    }
    
    function removeTag(tag) {
        const index = tags.indexOf(tag);
        if (index !== -1) {
        tags.splice(index, 1);
        }
    }
    
    function updateTags() {
        tagsList.innerHTML = "";
        tags.forEach((tag) => {
        addTag(tag);
        });
        
        // Update hidden input value
        hiddenTagsInput.value = tags.join(",");
    }
    
    tagInput.addEventListener("keydown", (e) => {
        if (e.key === "Enter") {
            e.preventDefault();
            const tag = tagInput.value.trim();
            if (tag) {
                tags.push(tag);
                updateTags();
                tagInput.value = "";
            }
        }
    });
    
    tagsList.addEventListener("click", (e) => {
        if (e.target.tagName === "LI") {
            const tag = e.target.textContent;
            removeTag(tag);
            updateTags();
        }
    });


    document.addEventListener("DOMContent2Loaded", function() {
        var dropdownButton = document.getElementById("dropdownButton");
        var dropdownMenu = document.getElementById("dropdownMenu");

        dropdownButton.addEventListener("click", function() {
            var display = window.getComputedStyle(dropdownMenu).getPropertyValue("display");
            if (display === "none") {
            dropdownMenu.style.display = "block";
            } else {
            dropdownMenu.style.display = "none";
            }
        });

        // Rest of the code...
    });



  });
</script>

<script>

function handleCheckboxChange() {
        var checkbox = document.getElementById('publishCheckbox');
        var status = document.getElementById('statusInput');

        if (checkbox.checked) {
            status.value = '1';
        } else {
            status.value = '0';
        }
    }

</script>



<script>
  document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('add_post');
    var createButton = document.getElementById('createButton');
    
    document.addEventListener('keydown', function(event) {
      var target = event.target;
      
      if (event.key === 'Enter' && target.tagName !== 'TEXTAREA') {
        event.preventDefault(); // Prevent form submission on Enter key press
        return false; // Prevent default behavior as fallback for older browsers
      }
    });
    
    form.addEventListener('submit', function(event) {
      if (event.submitter === createButton) {
        // Continue with form submission
      } else {
        event.preventDefault(); // Prevent form submission
      }
    });
    
    createButton.addEventListener('click', function() {
      form.submit(); // Manually trigger form submission
    });
  });
</script>


