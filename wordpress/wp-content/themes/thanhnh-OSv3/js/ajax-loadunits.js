$.ajax({
    type: 'post',
    dataType: "json",
    url: devvn_array.admin_ajax,
    data: {
        action: "loadprovince", //Tên action
        website: 'levantoan.com',//Biến truyền vào xử lý. $_POST['website']
    },
    context: this,
    beforeSend: function () {
        //Làm gì đó trước khi gửi dữ liệu vào xử lý
    },
    success: function (response) {
        //Làm gì đó khi dữ liệu đã được xử lý
        if (response.success) {
            console.log(response.data);
            let html = "<option>Chọn Tỉnh / Thành Phố</option>";
            response.data.map((item) => {
                html += `<option value="${item.name}" data-id="${item.matp}">${item.name}</option>`;
            });
            $('#acf-field_5b1e962cb71d3').html(html);
        }
        else {
            console.log('Đã có lỗi xảy ra')
        }
    },
    error: function (jqXHR, textStatus, errorThrown) {
        //Làm gì đó khi có lỗi xảy ra
        console.log('The following error occured: ' + textStatus, errorThrown);
    }
});

// arrow function not this
$('#acf-field_5b1e962cb71d3').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    var id = optionSelected.data("id");
    // data-id
    // console.log(optionSelected[0]);
    // console.log(id);
    loadDistrictByPid(id);
});
$('#acf-field_5b1e96acb71d4').html("<option>Chọn Quận / Huyện</option>");
function loadDistrictByPid(id) {
    $.ajax({
        type: 'post',
        dataType: "json",
        url: devvn_array.admin_ajax,
        data: {
            action: "loaddistrict", //Tên action
            id,//Biến truyền vào xử lý. $_POST['website']
        },
        context: this,
        beforeSend: function () {
            //Làm gì đó trước khi gửi dữ liệu vào xử lý
        },
        success: function (response) {
            if (response.success) {
                console.log(response.data);
                let html = "";
                response.data.map((item) => {
                    html += `<option value="${item.name}" data-id="${item.maqh}">${item.name}</option>`;
                });
                $('#acf-field_5b1e96acb71d4').html(html);
            }
            else {
                console.log('Đã có lỗi xảy ra')
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            //Làm gì đó khi có lỗi xảy ra
            console.log('The following error occured: ' + textStatus, errorThrown);
        }
    });
}

