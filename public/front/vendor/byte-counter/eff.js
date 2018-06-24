function ucs2decode(string) {
	var output = [],
		counter = 0,
		length = string.length,
		value,
		extra;
	while (counter < length) {
		value = string.charCodeAt(counter++);
		if (value >= 0xD800 && value <= 0xDBFF && counter < length) {
			// high surrogate, and there is a next character
			extra = string.charCodeAt(counter++);
			if ((extra & 0xFC00) == 0xDC00) { // low surrogate
				output.push(((value & 0x3FF) << 10) + (extra & 0x3FF) + 0x10000);
			} else {
				// unmatched surrogate; only append this code unit, in case the next
				// code unit is the high surrogate of a surrogate pair
				output.push(value);
				counter--;
			}
		} else {
			output.push(value);
		}
	}
	return output;
}
function check_input() {
	$('.check-input').on('keyup', function () {
		var textarea = $(this)[0];
		var value = textarea.value.replace(/\r\n/g, '\n');
		var maxlength = textarea.getAttribute('data-maxlength');
		//var encodedValue = encode(value);
		//var byteCount = utf8.encode(value).length;
		if (maxlength) {
			var characterCount = ucs2decode(value).length;
			//console.log(characterCount + ',' + maxlength);
			if (characterCount > maxlength) {
				textarea.value = textarea.value.substring(0, maxlength);
			}
		}
	});

	$.validator.addMethod("max_length", function (value, element) {
		if (value != "") {
			var max_length = element.getAttribute('data_maxlength');
			if (max_length) {
				var characterCount = ucs2decode(value).length;
				if (characterCount > max_length) {
					return false;
				}
			}
		}
		return true;
	});
	$.validator.addMethod("range_length", function (value, element) {
		if (value != "") {
			var rangelength = element.getAttribute('data_rangelength').split(',');
			if (rangelength) {
				var characterCount = ucs2decode(value).length;
				if (characterCount < rangelength[0] || characterCount > rangelength[1]) {
					return false;
				}
			}
		}
		return true;
	});

	$.validator.addMethod("kana", function (value, element) {
		return this.optional(element) || /^([ァ-ヶーぁ-ん]+)$/.test(value);
	});

	//Only Hiragana
	$.validator.addMethod("hiragana", function (value, element) {
		return this.optional(element) || /^([ぁ-ん]+)$/.test(value);
	});

	// Only katakana
	$.validator.addMethod("katakana", function (value, element) {
		return this.optional(element) || /^([ァ-ヶー]+)$/.test(value);
	});

	//Half character kana
	$.validator.addMethod("hankana", function (value, element) {
		return this.optional(element) || /^([ｧ-ﾝﾞﾟ]+)$/.test(value);
	});

	$.validator.addMethod("latitude", function (value, element) {
		var regex = /^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$/;
		return this.optional(element) || regex.test(value);
	});

	$.validator.addMethod("longitude", function (value, element) {
		var regex = /^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,6})?))$/;
		return this.optional(element) || regex.test(value);
	});

	$.validator.addMethod("valid_url", function (value, element) {
		if (value != "") {
			var regex = /^(http(s)?:\/\/)?(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
			if (value.substr(0, 7) != 'http://' && value.substr(0, 8) != 'https://') {
				return false;
			}
			return this.optional(element) || regex.test(value);
		} else {
			return true;
		}
	});
}
$(document).ready(function () {
	check_input();
});