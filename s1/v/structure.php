<?php
session_start();

//ERRORS DISPLAY
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	
	//include 'loginAlert.php';
	
class solutionArray 
{
	// property declaration
    public $settings = array(
		"questionDemoNumber"      =>'',
		"demoNumber"              =>'',
		"secondaryDemoNumber"     =>'',
		"thirdDemoNumber"         =>'',
		"views"                   =>'',
		"questionAdImg"           =>'',
		"solutionAdImg"           =>'',
		"solutionAdVideo"         =>'',
		"solutionAdAudio"         =>'',
		"questionDescriptionText" =>'',
		"imgName"                 =>'',
		"questionName"            =>'',
		"questionTag1"            =>'',
		"questionTag1Color"       =>'',
		"questionTag2"            =>'',
		"questionTag2Color"       =>'',
		"questionTag3"            =>'',
		"questionTag3Color"       =>'',
		"questionTag4"            =>'',
		"questionTag4Color"       =>'',
		"questionNumber"          =>'',
		"solutionMathjax"         =>'',
		"questionMathjax"         =>'',
		"fullSolutionMathjax"     =>''
	);
    
	public function __call($methodName, $params = null)
    {
        if($methodName == 'set' && count($params) == 2)
        {
            $key = $params[0];
            $value = $params[1];
            $this->settings[$key] = $value;
        }
        elseif($methodName == 'get' && count($params) == 1)
        {
            $key = $params[0];
            if(array_key_exists($key, $this->settings)) return $this->settings[$key];
        }
        else
        {
            exit('Opps! The method is not defined!');
        }
    }
	
	// method declaration
    public function displaySolutionArray() 
	{
		return $this->settings;
    }
}

class solution 
{
	// property declaration
    public $content;
	public $demoNumber;
    public $secondaryDemoNumber;
    public $thirdDemoNumber;
    public $imgName;
    public $questionName;
    public $questionTag1;
    public $questionTag2;
    public $questionTag3;
    public $questionTag4;
	public $questionTag1Flag;
    public $questionTag2Flag;
    public $questionTag3Flag;
    public $questionTag4Flag;
    public $questionTag1Color;
	public $questionTag2Color;
	public $questionTag3Color;
	public $questionTag4Color;
    public $questionNumber;
    public $solutionMathjax;
    public $fullSolutionMathjax;
	public $solutionAdImg;
    public $solutionAdImgFlag;
    public $solutionAdVideoFlag;
    public $solutionAdAudioFlag;
    public $views;
	
	public function __construct($solution_array)
	{
		
		$this->demoNumber=$solution_array['demoNumber'];
		$this->secondaryDemoNumber=$solution_array['secondaryDemoNumber'];
		$this->thirdDemoNumber=$solution_array['thirdDemoNumber'];
		$this->imgName=$solution_array['imgName'];
		$this->questionName=$solution_array['questionName'];
		$this->questionTag1=$solution_array['questionTag1'];
		$this->questionTag1Color=$solution_array['questionTag1Color'];
		$this->questionTag2=$solution_array['questionTag2'];
		$this->questionTag2Color=$solution_array['questionTag2Color'];
		$this->questionTag3=$solution_array['questionTag3'];
		$this->questionTag3Color=$solution_array['questionTag3Color'];
		$this->questionTag4=$solution_array['questionTag4'];
		$this->questionTag4Color=$solution_array['questionTag4Color'];
		$this->questionNumber=$solution_array['questionNumber'];
		$this->solutionMathjax=$solution_array['solutionMathjax'];
		$this->fullSolutionMathjax=$solution_array['fullSolutionMathjax'];
		$this->views=$solution_array['views'];
			
		$this->solutionAdImgFlag=0;
		$this->solutionAdVideoFlag=0;
		$this->solutionAdAudioFlag=0;
		
		if(isset($solution_array['questionTag1']) && !empty($solution_array['questionTag1']))	
		{
			$this->questionTag1=$solution_array['questionTag1'];
			$this->questionTag1Flag=1;
		}
		
		if(isset($solution_array['questionTag2']) && !empty($solution_array['questionTag2']))	
		{
			$this->questionTag2=$solution_array['questionTag2'];
			$this->questionTag2Flag=1;
		}
		
		if(isset($solution_array['questionTag3']) && !empty($solution_array['questionTag3']))	
		{
			$this->questionTag3=$solution_array['questionTag3'];
			$this->questionTag3Flag=1;
		}
		
		if(isset($solution_array['questionTag4']) && !empty($solution_array['questionTag4']))	
		{
			$this->questionTag4=$solution_array['questionTag4'];
			$this->questionTag4Flag=1;
		}
		
		if(isset($solution_array['solutionAdImg']) && !empty($solution_array['solutionAdImg']))	
		{
			$this->solutionAdImg=$solution_array['solutionAdImg'];
			$this->solutionAdImgFlag=1;
		}
		
		if(isset($solution_array['solutionAdVideo']) && !empty($solution_array['solutionAdVideo']))	
		{
			$this->solutionAdVideo=$solution_array['solutionAdVideo'];
			$this->solutionAdVideoFlag=1;
		}
		if(isset($solution_array['solutionAdAudio']) && !empty($solution_array['solutionAdAudio']))	
		{
			$this->solutionAdAudio=$solution_array['solutionAdAudio'];
			$this->solutionAdAudioFlag=1;
		}

		
		$this->content = '
		<div class="w3-container w3-hide Demo'.$this->demoNumber.' padding-left-zero">
				<ul class="w3-ul w3-card-4 w3-margin-bottom">
					<li class="w3-bar" onclick="myFunction(\'Demo'.$this->secondaryDemoNumber.'\')" style="width:100%;">
						<img src="'.$this->imgName.'" class="w3-bar-item w3-circle" style="width:68px">
						<div class="w3-bar-item w3-right">
							<span class="w3-large">'.$this->questionName.' | </span>
							<span>'.$this->questionNumber.' | </span>
							<span>'.$this->views.' צפיות</span>
							<p class="margin-bottom-0px">';
								if($this->questionTag1Flag)
								{
									$this->content.='<span class="w3-tag margin-left-2px w3-'.$this->questionTag1Color.'">'.$this->questionTag1.'</span>';
								}
								if($this->questionTag2Flag)
								{
									$this->content.='<span class="w3-tag margin-left-2px w3-'.$this->questionTag2Color.'">'.$this->questionTag2.'</span>';
								}
								if($this->questionTag3Flag)
								{
									$this->content.='<span class="w3-tag margin-left-2px w3-'.$this->questionTag3Color.'">'.$this->questionTag3.'</span>';
								}
								if($this->questionTag4Flag)
								{
									$this->content.='<span class="w3-tag margin-left-2px w3-'.$this->questionTag4Color.'">'.$this->questionTag4.'</span>';
								}
							
							$this->content.='</p>
							<span>לחצ/י לפיתרון</span>
						</div>
					</li>
				</ul>
				
				
				<div class="w3-card-4 w3-margin-bottom w3-hide Demo'.$this->secondaryDemoNumber.'" style="width:100%">
					<div onclick="myFunction(\'Demo'.$this->thirdDemoNumber.'\')" class="w3-container w3-center">
					<p>'.$this->solutionMathjax.'</p>
					</div>
					
					<div class="w3-container w3-hide Demo'.$this->thirdDemoNumber.'">
						<div style="width:75%;margin:auto;">
							<hr>
						</div>
						<p>'.$this->fullSolutionMathjax.'</p>';
		
		if($this->solutionAdImgFlag)
		{
			//$this->content.='<img src='.$this->solutionAdImg.' style="width:100%;" class="w3-margin-bottom" /></div></div></div>';
			$this->content.=$this->solutionAdImg;
		}
		if ($this->solutionAdVideoFlag)
		{
			//$this->content.='<iframe width="100%" height="235px" class="w3-margin-bottom" src="https://www.youtube.com/embed/QAgy9r331v0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div></div></div>';
			$this->content.=$this->solutionAdVideo;
		}
		if ($this->solutionAdAudioFlag)
		{
			//$this->content.='<iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/609498354&color=%2300aabb&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe></div></div></div>';
			$this->content.=$this->solutionAdAudio;
		}
		
		$this->content.='</div></div></div>';
	}
	
	// method declaration
    public function displayContent() 
	{
        echo $this->content;
    }
}

class question
{
	// property declaration
    public $content;
	public $demoNumber;
    public $imgName;
    public $questionName;
    public $questionTag1;
    public $questionTag2;
    public $questionTag3;
    public $questionTag4;
	public $questionTag1Flag;
    public $questionTag2Flag;
    public $questionTag3Flag;
    public $questionTag4Flag;
    public $questionNumber;
    public $descriptionText;
    public $questionMathjax;
    public $questionAdImg;
    public $questionAdImgFlag;
    public $questionAdImgIframeFlag;
    public $views;
	
	public function __construct($solution_array)
	{
		
		$this->demoNumber=$solution_array['questionDemoNumber'];
		$this->descriptionText=$solution_array['questionDescriptionText'];
		
		$this->imgName=$solution_array['imgName'];
		$this->questionName=$solution_array['questionName'];
		$this->questionTag1=$solution_array['questionTag1'];
		$this->questionTag1Color=$solution_array['questionTag1Color'];
		$this->questionTag2=$solution_array['questionTag2'];
		$this->questionTag2Color=$solution_array['questionTag2Color'];
		$this->questionTag3=$solution_array['questionTag3'];
		$this->questionTag3Color=$solution_array['questionTag3Color'];
		$this->questionTag4=$solution_array['questionTag4'];
		$this->questionTag4Color=$solution_array['questionTag4Color'];
		$this->questionNumber=$solution_array['questionNumber'];
		$this->questionMathjax=$solution_array['questionMathjax'];
		$this->views=$solution_array['views'];
		
		$this->questionAdImgFlag=0;
		$this->questionAdImgIframeFlag=0;
		
		if(isset($solution_array['questionTag1']) && !empty($solution_array['questionTag1']))	
		{
			$this->questionTag1=$solution_array['questionTag1'];
			$this->questionTag1Flag=1;
		}
		
		if(isset($solution_array['questionTag2']) && !empty($solution_array['questionTag2']))	
		{
			$this->questionTag2=$solution_array['questionTag2'];
			$this->questionTag2Flag=1;
		}
		
		if(isset($solution_array['questionTag3']) && !empty($solution_array['questionTag3']))	
		{
			$this->questionTag3=$solution_array['questionTag3'];
			$this->questionTag3Flag=1;
		}
		
		if(isset($solution_array['questionTag4']) && !empty($solution_array['questionTag4']))	
		{
			$this->questionTag4=$solution_array['questionTag4'];
			$this->questionTag4Flag=1;
		}
				
		if(isset($solution_array['questionAdImg']) && !empty($solution_array['questionAdImg']))	
		{
			$this->questionAdImg=$solution_array['questionAdImg'];
			$this->questionAdImgFlag=1;
			
			//Iframe
			if(substr($this->questionAdImg,0,26) == '<div class="videoWrapper">')
			{
				$this->questionAdImgIframeFlag=1;
			}
		}
		
		$this->content = '
			<li class="w3-bar" onclick="myFunction(\'Demo'.$this->demoNumber.'\')" style="width:100%;">
				<div class="w3-rest">
					<div class="w3-bar-item w3-right">
						<span class="w3-large">'.$this->questionName.'</span>
						<p class="margin-bottom-0px">';
													
						$this->content.='</p>
						<span>'.$this->descriptionText.'</span>
					</div>
				</div>';
				
				if($this->questionAdImgIframeFlag)
				{
					$this->content.='<div class="w3-container w3-hide Demo'.$this->demoNumber.' no-padding">';
				}
				else
				{
					$this->content.='<div class="w3-container w3-hide Demo'.$this->demoNumber.'">';
				}
			    
				$this->content.='<div style="width:75%;margin:auto;">
						<hr>
					</div>';
					
					if($this->questionAdImgFlag)
					{
						//$this->content.=$this->questionMathjax.'<img src='.$this->questionAdImg.' style="width:100%;" /></div></li>';
						$this->content.=$this->questionMathjax.$this->questionAdImg.'</div></li>';
					}
					else
					{
						$this->content.=$this->questionMathjax.'</div></li>';
					}
	}
	
	// method declaration
    public function displayContent() 
	{
        echo $this->content;
    }
}

class documentHeader
{
	// property declaration
    // none
	
	// method declaration
	// none
	
	public function __construct()
	{
		$this->content = '
			<!DOCTYPE html>
<html lang="iw">
<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148377156-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag(\'js\', new Date());

  gtag(\'config\', \'UA-148377156-1\');
</script>

<!-- FAVICON --><!-- OUTPUT 01_NOT NUMBERED -->
<link rel="icon" type="image/png" href="../css/favicon.ico">

<!-- APPLE TOUCH ICON --><!-- OUTPUT 02 -->
<link rel="apple-touch-icon" sizes="16x16" href="../css/favicon-16x16.png" />
<link rel="apple-touch-icon" sizes="32x32" href="../css/favicon-32x32.png" />
<link rel="apple-touch-icon" sizes="192x192" href="../css/android-chrome-192x192.png" />
<link rel="apple-touch-icon" sizes="512x512" href="../css/android-chrome-512x512.png" />
<link rel="apple-touch-icon" href="../css/apple-touch-icon.png" />

<!-- Encoding -->
<meta charset="utf-8">
	
<title>עזרה ראשונה | קורס 44 שעות למשיט 60</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="css/w3css_4_w3.css">
<!-- JQUERY --><script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="questionJs/questions.js"></script>
<!-- MATHJAX --><script src=\'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML\' async></script>
<!-- MATH LATEX SYNTAX: https://en.wikibooks.org/wiki/LaTeX/Mathematics -->
<!-- MATHJAX SYNTAX: https://docs.mathjax.org/en/latest/start.html -->
<link href="https://fonts.googleapis.com/css?family=Alef&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!-- EMOJI CSS --><link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
</head>

<body>
<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large" style="text-align:right;">&times; סגירה</button>
  
  <div class="w3-bar-item w3-button" style="text-align:right;"><b>חומר תאורטי</b></div>
  <a href="../questions/index.php" class="w3-bar-item w3-button" style="text-align:right;">עמודים 1-8</a>
  <a href="../questions_01/index.php" class="w3-bar-item w3-button" style="text-align:right;">עמודים 9-16</a>
  <a href="../questions_02/index.php" class="w3-bar-item w3-button" style="text-align:right;">עמודים 17-24</a>
  <a href="../questions_03/index.php" class="w3-bar-item w3-button" style="text-align:right;">עמודים 25-32</a>
  <a href="../questions_04/index.php" class="w3-bar-item w3-button" style="text-align:right;">עמודים 33-36</a>
</div>

<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  <div class="w3-container w3-center">
    <h1 style="margin-top:0px;">עזרה ראשונה | גונן</h1>
  </div>
</div>
		';
	}
	
	// method declaration
    public function displayContent() 
	{
        echo $this->content;
    }
}

class subjectHeader
{
	// property declaration
    // none
	
	// method declaration
	// none
	
	public function __construct($subjectName)
	{
		$this->content = '
		
<div class="w3-container w3-center">
  <h2 style="margin-top:10px;">'.$subjectName.'</h2>
</div>

<div class="w3-row w3-container w3-center">
    <div class="w3-card-4 w3-col l3 m2 s0 w3-center" style="opacity:0;float:right;">&nbsp;</div>

		';
	}
	
	// method declaration
    public function displayContent() 
	{
        echo $this->content;
    }
}

class middlePart
{
	// property declaration
    // none
	
	// method declaration
	// none
	
	public function __construct()
	{
		$this->content = '
    
	<div class="w3-col l6 m8 s12 w3-center" style="float:right;">
		<ul id="div1" class="w3-ul w3-card-4">
		';
	}
	
	// method declaration
    public function displayContent() 
	{
        echo $this->content;
    }
}

class listBeforeFooter
{
	// property declaration
    // none
	
	// method declaration
	// none
	
	public function __construct()
	{
		$this->content = '</ul>';
	}
	
	// method declaration
    public function displayContent() 
	{
        echo $this->content;
    }
}


class footer
{
	// property declaration
    // none
	
	// method declaration
	// none
	
	public function __construct($indexPage = null)
	{
		$this->content = '
			<li class="w3-bar" onclick="myFunction(\'Demo5\')" style="width:100%;">
				<div class="w3-bar-item w3-right">
					<span class="w3-large">הוספה לסיכום</span><br>
				</div>
			</li>
			
			<li class="w3-bar w3-hide Demo5" style="width:100%;">
				<div class="w3-container w3-teal">
					<h2 style="margin-top:10px;">הוספה</h2>
				</div>
				
				<form class="w3-container w3-card-4">
					<p class="align-right margin-bottom-0px">      
						<label class="w3-text-grey margin-bottom-0px margin-top-5px">העלאת תמונה</label>
						<p class="align-right margin-bottom-0px"></p>
						<!-- FORM 01 -->
						<table style="width:100%;margin:auto;border-collapse:collapse;direction:ltr;">
							<tr style="width:100%;">
								<td style="width:100%;text-align:left;">
									<input class="w3-input" type="file" name="file_01" id="file_01" style="display:inline;padding-right:0px;">
								</td>
							</tr>
							<tr style="width:100%;">
								<td style="width:100%;text-align:left;">
									<input class="w3-input" type="button" value="Upload File" onclick="uploadFile_01()" style="display:inline;margin-top:2px;">
									<input class="w3-input" type="button" value="Cancel" id="cancel" style="display:inline;margin-top:2px;">
								</td>
							</tr>
							<tr>
								<td style="width:100%;text-align:left;direction:ltr;">
									<!-- PROGRESS BAR -->
									<progress style="vertical-align:top;width:100%;float:right;" id="progressBar_01" value="0" max="100"></progress>
									<h3 class="w3-input" id="status_01" style="width:100%;direction:ltr;font-size:14px;"></h3>
									<p class="w3-input" id="loaded_n_total_01" style="display:none;"></p> 
								</td>
							</tr>
						</table>
					</p>
				</form>
			</li>
		</ul>
	</div>
</div>
<div class="w3-card-4 w3-col l3 m2 s0 w3-center" style="opacity:0;float:right;">&nbsp;</div>

<div id="disqus_thread" style="padding:10px;margin-top:20px;"></div>
<script>

	/**
	*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
	*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
	
	var disqus_config = function () {
	this.page.url = \'http://firstaid.explainit.online\';  // Replace PAGE_URL with your page\'s canonical URL variable
	this.page.identifier = \'Index\'; // Replace PAGE_IDENTIFIER with your page\'s unique identifier variable
	};
	
	(function() { // DON\'T EDIT BELOW THIS LINE
	var d = document, s = d.createElement(\'script\');
	s.src = \'https://firstaid-explainit-online.disqus.com/embed.js\';
	s.setAttribute(\'data-timestamp\', +new Date());
	(d.head || d.body).appendChild(s);
	})();
</script>

<script>
$(document).ready(function(){';
	
	if(isset($indexPage)&&!empty($indexPage))
	{
		$this->content.='$("#button01").css("background-color","#009688").css("color","white");';
	}
	
	$this->content.='$("#button01").click(function(){
	$(this).css("background-color","#009688").css("color","white");
	$("#button02").css("background-color","white").css("color","black");
	$("#button03").css("background-color","white").css("color","black");
	$("#button04").css("background-color","white").css("color","black");
	
    $.ajax({url: "solution/solution_01.php", success: function(result){
      $("#div2").html(result);
	  
		$.ajax({url: "questions/questions_01.php", success: function(result){
			 $("#div1").html(result);
		}});
	}});
  });
  
  $("#button02").click(function(){
	$(this).css("background-color","#009688");
	$(this).css("color","white");
	$("#button01").css("background-color","white").css("color","black");
	$("#button03").css("background-color","white").css("color","black");
	$("#button04").css("background-color","white").css("color","black");
	
	$.ajax({url: "solution/solution_02.php", success: function(result){
      $("#div2").html(result);
	  
		$.ajax({url: "questions/questions_02.php", success: function(result){
			 $("#div1").html(result);
		}});
	}});
  });
  
  $("#button03").click(function(){
	$(this).css("background-color","#009688");
	$(this).css("color","white");
	$("#button01").css("background-color","white").css("color","black");
	$("#button02").css("background-color","white").css("color","black");
	$("#button04").css("background-color","white").css("color","black");
	
    $.ajax({url: "solution/solution_03.php", success: function(result){
      $("#div2").html(result);
	  
		$.ajax({url: "questions/questions_03.php", success: function(result){
			 $("#div1").html(result);
		}});
	}});
  });
  
  $("#button04").click(function(){
	$(this).css("background-color","#009688");
	$(this).css("color","white");
	$("#button01").css("background-color","white").css("color","black");
	$("#button02").css("background-color","white").css("color","black");
	$("#button03").css("background-color","white").css("color","black");
	
    $.ajax({url: "solution/solution_04.php", success: function(result){
      $("#div2").html(result);
	  
		$.ajax({url: "questions/questions_04.php", success: function(result){
			 $("#div1").html(result);
		}});
	}});
  });
});
</script>

<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</body>
</html>           
		';
	}
	
	// method declaration
    public function displayContent() 
	{
        echo $this->content;
    }
}

?>
