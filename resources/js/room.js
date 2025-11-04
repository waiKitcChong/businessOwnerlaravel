const modalOverlay = document.querySelector('.modal-overlay');
  const openBtn = document.querySelector('.btn-add-room');
  const closeBtn = document.querySelector('.modal-close');
  const cancelBtn = document.querySelector('.cancel');

  openBtn.addEventListener('click', () => {
    modalOverlay.classList.add('show');
  });

  closeBtn.addEventListener('click', () => {
    modalOverlay.classList.remove('show');
  });

  cancelBtn.addEventListener('click', () => {
    modalOverlay.classList.remove('show');
  });

  // Close modal when clicking outside of it
  modalOverlay.addEventListener('click', (e) => {
    if (e.target === modalOverlay) {
      modalOverlay.classList.remove('show');
    }
  });





  

$(document).ready(function () {
    const loadingOverlay = $(`
      <div id="tableLoadingOverlay" 
           style="
             display:none;
             position:absolute;
             top:0;
             left:0;
             width:100%;
             height:100%;
             background:rgba(255,255,255,0.8);
             z-index:999;
             display:flex;
             justify-content:center;
             align-items:center;
             transition: opacity 0.2s ease-in-out;
             opacity:0;
           ">
        <img src="/image/Loading.gif" 
             alt="Loading..." 
             style="width:60px; height:60px;">
      </div>
    `);

    const TableBody = $("#TableBody");
    TableBody.parent().css("position", "relative");
    TableBody.after(loadingOverlay);

    $("#tableLoadingOverlay").hide().css("opacity", 0);

    function loadPage(page) {
        const overlay = $("#tableLoadingOverlay");
        overlay.show().css("opacity", 1);

        $.ajax({
            url: "/business_owner/room",
            type: "GET",
            data: { page: page },
            success: function (response) {
                const newTbody = $(response).find("#TableBody").html();
                TableBody.fadeOut(100, function () {
                    $(this).html(newTbody).fadeIn(150);
                });
                $("#pagination").html($(response).find("#pagination").html());
                $("#room-count").text($(response).find("#room-count").text());
            },
            error: function () {
                alert("Try again later.");
            },
            complete: function () {
                overlay.css("opacity", 0);
                setTimeout(() => overlay.hide(), 200); 
            }
        });
    }

    $(document).on("click", ".page-link", function (e) {
        e.preventDefault();
        const page = $(this).data("page");
        loadPage(page);
    });
});