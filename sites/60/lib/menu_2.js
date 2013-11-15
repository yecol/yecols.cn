 var offsets = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -60];
            $(document).ready(function(){
                //related link
                $('#relatedLinks').hover(function(){
                    $('#rlinks').show();
                }, function(){
                    $('#rlinks').hide()
                });
                $('#rlinks').hover(function(){
                    $('#rlinks').show();
                }, function(){
                    $('#rlinks').hide()
                });
                //menu
				if($('li.on').length!=0){
				$t_targetLeft = $('li.on').position().left;
				$t_curIndex = $('li.mitem').index($('li.on')) + 1;
				$('div#sub_' + $t_curIndex).css({
                        left: $t_targetLeft + offsets[$t_curIndex] + 'px'
                    });
				}
                $('.mitem a').hover(function(){
                    $(this).parent().siblings().removeClass("on");
                    $(this).parent().addClass("on");
                    $targetLeft = $(this).position().left;
                    $curIndex = $('li.mitem').index($(this).parent()) + 1;
                    $('div.sn').css({
                        left: '-9999px'
                    })
                    $('div#sub_' + $curIndex).css({
                        left: $targetLeft + offsets[$curIndex] + 'px'
                    });
                });
				
				if($('div.main_2').height()<500){
					console.log("xiaoyu");
					$('div.main_2').height(500);
				}
			});