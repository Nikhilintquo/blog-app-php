// $(document).ready(function () {});

$("#submit").on("click", function (e) {
  e.preventDefault();
  // console.log(document.body);
  var form = $("form")[0]; // You need to use standard javascript object here
  var formData = new FormData(form);

  $.ajax({
    url: "../backend/store.php",
    method: "POST",
    data: formData,
    contentType: false,
    processData: false,
    cache: false,
    success: function (result) {
        console.log(result.header);
    },
  });
});

$(document).ready(function () {
  var settings = {
    url: "../backend/show.php",
    method: "GET",
    timeout: 0,
  };

  $.ajax(settings).done(function (response) {
    let data = JSON.parse(response)
    let apiResult = ''

    var count = data.length;
    console.log(count);
    if (count > 0) {
      for (var i = 0; i < count; i++) {
        apiResult += `<div class="col-md-4 mb-2">
        <div class="card h-100">
            <img src="${data[i].bimage}" class="card-img-top" alt="Blogs Image">
            <span class="c-date">${data[i].date}</span>
            <div class="card-body">
                <h5 class="card-title">${data[i].title}</h5>
                <p class="card-text">${data[i].body}</p>
                <a href="/frontend/blog-details.html" class="btn btn-primary">SEE DETAILS</a>
            </div>
        </div>
    </div>`
    
      }
    }

    document.querySelector('#showBlogs').innerHTML = apiResult
  });
});
