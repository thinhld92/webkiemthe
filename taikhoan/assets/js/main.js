function setSwal(str, url) {
    swal.fire({
        title: "Thông báo",
        text: "",
        type: "success",
        html: str,
        confirmButtonText: 'Xem',
        cancelButtonText: 'Đóng',
        showCancelButton: true,
    }, function(){
    }).then((result) => {
        if (result.value) {
            if(url != "") {
                window.location = url;
            }
        }
    });
}

var APIMUMOBILE = {};
APIMUMOBILE.onContentRemove = function(jContent) {
    jContent.find('[data-toggle^="popover"]').popover('hide');
    jContent.find('[data-toggle^="tooltip"]').tooltip('hide');

}
APIMUMOBILE.submitTarget = function(el, target) {
    var url = $(el).attr('action');
    var method = $(el).attr('method');
    var data = $(el).serialize();
    $(el).find(':submit').prop('disabled', true);
	$('#skm_LockPane').attr("class", "LockOn").html("Please wait a moment, please do not close the window<br/><img src='assets/images/loading.gif' style='width: 70px;'>");
	$.post(url, data, function(json) {
		if (json['status'] == 0) {
            var url = json['url'];
            swal.fire({
                icon: 'success',
                title: 'Thành công',
                text: json['msg'],
              }).then((result) => {
                if (result.value) {
                    if(url != "") {
                        window.location = url;
                    }
                }
            });
		} else {
            swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: json['msg'],
              })
		}
		$('#skm_LockPane').attr("class", "LockOff");
		$(el).find(':submit').prop('disabled', false);
	}, 'json');	

    return false;
}
APIMUMOBILE.alertTarget = function(msg, url) {
    BootstrapDialog.show({
		type: BootstrapDialog.TYPE_SUCCESS,
        message: msg,
        cssClass: 'my-vertical-center-dialog',
        title: 'Notification ' + APIMUMOBILE.getDialogTile(),
        buttons: [{
            label: 'Next',
            hotkey: 13,
            action: function(dialogItself) {
                dialogItself.close();
				window.location = url;
            }
        }]
    });
}
APIMUMOBILE.alertTarget2 = function(msg, url) {
    BootstrapDialog.show({
		type: BootstrapDialog.TYPE_PRIMARY,
        message: msg,
        cssClass: 'my-vertical-center-dialog',
        title: 'Notification ' + APIMUMOBILE.getDialogTile(),
		buttons: [{
			label: 'Next',
            hotkey: 13,
			action: function(dialogItself) {
				dialogItself.close();
                window.location = url;
			}
		}, {
			label: 'Close',
			action: function(dialogItself) {
				dialogItself.close();
			}
		}]
    });
}
APIMUMOBILE.alertTarget3 = function(msg) {
    BootstrapDialog.show({
		type: BootstrapDialog.TYPE_DANGER,
        message: msg,
        cssClass: 'my-vertical-center-dialog',
        title: 'Notification ' + APIMUMOBILE.getDialogTile(),
        buttons: [{
            label: 'Close',
            hotkey: 13,
            action: function(dialogItself) {
                dialogItself.close();
				 location.reload();
            }
        }]
    });
}
APIMUMOBILE.loadTarget = function(url, target) {
	/*
	$.ajax({
		url: url,
		type: 'GET',
		success: function(data) {
			APIMUMOBILE.alertTarget(data, "");
		},
		error: function(e) {
			APIMUMOBILE.alertTarget3('Có lỗi xảy ra khi tải trang: ' + url + '<br>Phiền bạn báo lại cho chúng tôi.');
		}
	});
	*/
	$.post(url, function(json) {
        if (json['status'] == 0) {
           APIMUMOBILE.alertTarget(json['msg'], "");
        } else if (json['status'] > 0) {
            APIMUMOBILE.alertTarget3(json['msg']);
        } else {
            APIMUMOBILE.alertTarget3('Có lỗi xảy ra khi tải trang: ' + url + '<br>Phiền bạn báo lại cho chúng tôi.');
        }
    }, 'json');
}
APIMUMOBILE.getDialogTile = function() {
    var ele = $('#SessionName');
    if (ele.length == 0) {
        return '';
    }
    return ' ( ' + ele.html() + ' )';
}
APIMUMOBILE.submit = function(el) {
    APIMUMOBILE.submitTarget(el, "#result_background");
    return false;
}