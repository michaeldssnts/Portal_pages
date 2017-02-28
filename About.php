<!-- Contact form -->
<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'i2i portal contact form'; 
		$to = 'michael@i2ifacility.org'; 
		$subject = 'i2i portal contact form';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";

		
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
	
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}


if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! We will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
}
	}
?>
<!-- Contact form post end-->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"    content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>About i2i</title>
<!-- Bootstrap -->
<!-- <link href="css/bootstrap.no-icons.min.css" rel="stylesheet"> -->
<!-- Icons -->
<!-- <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"> -->
<link href="css/bootstrap-3.3.5.css" rel="stylesheet" type="text/css">
<!-- Fonts -->

<!-- styles -->
<link rel="stylesheet" href="css/slider.css">
<link rel="stylesheet" href="css/exported_components.css">
<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    
    


</head>
<body id="home" class="home">
	
	
	
	
	
	<!-- About us Accordion -->

	<div class="container">
	
	<!-- You can use this as the anchor link-->
  <a name="about"></a>
    <!-- You can use this as the anchor link-->
  
	  <h1>About i2i</h1>
       <div class="border">

 <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
   <div class="panel panel-default">
     <div class="panel-heading" role="tab">
       <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">Background</a></h4>
     </div>
     <div id="collapseOne1" class="panel-collapse collapse in">
       <div class="panel-body">The availability of data in financial inclusion has grown tremendously in recent years. Data initiatives such as the World Bank’s Findex, FinMark Trust’s Finscope, IMF’s Financial Access Surveys, AFI’s Core Set, GPFI’s Basic Set, MIX Market’s Finclusion Lab, as well as countless studies driven at a national level have played a critical role in deepening our understanding of financial inclusion.<br><br> 

At the same time, increasing volumes of client data are becoming available for use by financial service providers. This includes internal client data such as transactional data as well as new external sources of data emerging from fields that were previously thought of as unrelated to financial services. These alternative data sources – number of Facebook likes, overnight airtime balance, what material your home is made of – are being used to gather important information to deliver financial services to new consumer segments. While many of these innovations are happening outside of the financial inclusion space, the availability of this data and willingness of providers to use them in developing and emerging market contexts has resulted in rich insights that can help service providers reach and serve previously excluded populations. <br><br> 

However, despite the increasing availability of data, in practice a disconnect still exists between the decisions being made for financial inclusion and the data. Whether it’s that the data is not easily accessible or that it does not respond to their specific needs, policymakers, financial service providers, and development partners have yet to fully capitalise on the power of data to inform their work. This data gap hinders the ability of the financial sector to reach out to all segments of the population and generate better financial inclusion and welfare outcomes.<br><br>

Launched in 2015, i2i was created in response to this identified data gap. The i2i facility is jointly hosted by <a href="http://www.cenfri.org" target="_blank">Cenfri </a>and <a href="http://www.finmark.org.za/" target="_blank">FinMark Trust</a> and funded by the <a href="http://www.gatesfoundation.org/" target="_blank">Bill & Melinda Gates Foundation</a> in partnership with <a href="http://www.mastercardfdn.org/" target="_blank">The MasterCard Foundation</a>. </div>
     </div>
   </div>
   <div class="panel panel-default">
     <div class="panel-heading">
       <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1">About us</a></h4>
     </div>
     <div id="collapseTwo1" class="panel-collapse collapse">
       <div class="panel-body">
          <p>
    We are in the business of liberating data. Whether you are a financial service provider, a policymaker, impact investor, or development partner, we want you to optimise the impact of your work through the use of data. i2i is a resource centre that aims to catalyse the provision and use of data by private and public sector actors to improve financial inclusion through evidence-based, data-driven policies and client-centric product design. 
</p>

   
<p>
  We facilitate the data market and bridge the data gap to sustainably connect decision-makers with the data they need. We accomplish this by building on and showcasing the existing knowledge base of financial inclusion data and collaborating with a wide range of partners, including, individuals, companies, organizations, and other entities that are well-positioned to provide high-quality data solutions to financial service providers, policymakers, and other financial inclusion actors.
</p>

<p>
We innovate around data. Data can play an integral role in all aspects of financial inclusion development. We are experimenting with new ways to collect, analyse and store data more effectively and efficiently. This can mean lowering the cost of up-to-date, high quality geospatial data on financial access points or helping banks offer more tailored financial solutions to their clients by analysing their existing transactional data. We are also looking into integrated data solutions such as machine learning to better assess credit worthiness for clients with no official credit history or APIs to share client data to open the door to additional services that improve their client value. Currently, many of these practices are emerging and being adopted in developed countries or in other sectors. We are looking to learn from these innovations and apply them, where relevant, to opportunities for expanding financial inclusion in developing and emerging markets. 
</p>


<p>
Data is a public good and we believe that making financial inclusion data more open will change the sector in ways we cannot yet even imagine. We open data in three ways:
</p>

 <ul class="list-group">
      <li class="list-group-item">We provide a platform for others to open their datasets to the public;</li>
      <li class="list-group-item">We build the capacity of others to collect, use, and share data through technical assistance, challenge funds, and our communities of practice; and</li>
      
       <li class="list-group-item">We disseminate best practices and lessons learned about data and financial inclusion through publications and other communications</li>
     
    </ul>
    
  <p>
  We enable financial inclusion that enables. We believe that financial inclusion enables people to weather economic storms, make productive investments, and accumulate wealth. To achieve this, we envision a vibrant responsive data solutions market. We enable local and international data scientists to better serve financial service providers and policymakers with relevant, robust, quality data solutions. At the same time, we enable financial service providers and policymakers to tap into this pool of local and international expertise and talent to help translate data into insights and insights into real impact on the ground. (Then measure that impact!) We do this through funding, technical assistance, and connecting data expertise and financial sector practitioners.
</p>  
       
       
       </div>
     </div>
   </div>

 </div>

   </div>
  
			
 <!-- About us Accordion end -->
           
           
    
    <hr>
    
    
<!-- i2i Team members -->
   
       
       <!-- You can use this as the anchor link-->
        <a name="team"></a>  
        <!-- You can use this as the anchor link end-->
    
    
      <h1>i2i Team members</h1>
	
		<section id="slider">
		    <div>
		        <h2>Celina Lee</h2>
		        <p>Celina leads the i2i facility from a position of deep-seated excitement about all things data - from statistical analysis and measurement frameworks to data mining and GIS. She has dedicated her career to finding ways to collect, analyse and use data for better decision-making and to enhance people's lives. Celina joined i2i from the world of independent consulting. Before that, she headed up monitoring and evaluation work at the Alliance for Financial Inclusion (AFI), where she led the development of the core set of financial inclusion indicators. Celina has worked with various actors in the financial inclusion space, including central banks, microfinance associations, international development partners, multilateral institutions and non-profits.
  <br> <br>
She has worked and lived in Latin America, Asia, and Africa. In addition to financial inclusion, Celina also has experience in micro and small enterprise development, market system development, climate change, gender and public health. Celina holds a Bachelor of Science in Applied Mathematics and a Master of International Affairs in Policy and Economic Analysis, both from Columbia University in New York.</p>
		       
	          <img data-info="Lead" src="images/Celina.jpg" alt="" />
		    </div>
		    
		    
		    
		    <div>
		        <h2>Nkosi Ncube </h2>
		        <p>Nkosi heads up i2i's Applications Lab which seeks to increase the use of client data and research by financial service providers in the development of products and services for financially underserved individuals. He is interested in innovations for increased usage of financial services and in how collaboration between banks and mobile telecommunications can contribute to poverty reduction in Africa. 
  <br> <br>
Nkosi started his career at Standard Chartered Bank. After working for various financial institutions, he moved to the telecoms industry as a founding executive of EcoCash in Zimbabwe. From there, he moved to Telecel where he developed Telecash - one of the first mobile money solutions to integrate to a national banking switch, Zimswitch. He left the position of Telecel's Chief Commercial Officer to join i2i. Nkosi holds a Bachelor of Business Studies degree from the University of Zimbabwe and an MBA.</p>
		  
	          <img data-info="Application Lab" src="images/NKOSI.jpg" alt="" />
		    </div>
		
	    
	    
	     <div>
		        <h2>Abenaa Addai </h2>
           <p>Over the last 20 years, Abenaa has specialised in analysing and researching financial markets from a regulatory perspective, as well as on how to make them work for lower-end customers. She has worldwide industry experience gained through management positions with financial service providers and social and financial investment funds. Over the years, Abenaa has led teams in conducting primary and secondary research on making markets work for low-income individuals. She combines her financial inclusion diagnostic skills and uses a holistic approach to examine demand, supply and regulation across savings, credit, insurance, and payment systems.
  <br> 
Before joining i2i, Abenaa established and managed a consulting company based in Mozambique, specialising in agriculture and finance, translating her experience into concrete solutions to the issue of financial inclusion for the underpriviledged. Based on findings gained through a pragmatic approach in working with the underbanked population, she developed and contributed to more inclusive financial systems. 
	  <br> 
	Abenaa has a masters degree in Economics from the University of Göttingen, Germany and a post-graduate degree in Development Studies of the University of Berlin, Germany.  
	      
	  </p>
		  
	          <img data-info="Client Insights" src="images/abeena.jpg" alt="" />
		    </div>
	    
	    
	      <div>
		        <h2>Grant Robertson </h2>
           <p>Grant is i2i's Head of Survey & GIS Data for Financial Inclusion (Data4FI). Grant has over 20 years’ experience in research having held executive positions in Client Insights, Statistics, Data Collection, Product Development, Finance and MI. His interests include research methodology, statistics, data collection, consumer insights, data and behavioural science. Grant has a Masters Degree in Research Psychology from the University of Port Elizabeth.
 
	  </p>
		  
	          <img data-info="Data4FI" src="images/grant.jpg" alt="" />
		    </div>
	    
	    
	    
	    
	    
	    
	      <div>
		        <h2>Roelof Goosen </h2>
           <p>After a rewarding and diverse career in retail financial services, with involvement in most aspects of this industry, I continue to enjoy new challenges and has the ability to bring my experience, insight and knowledge to bear on situations and organisations requiring leadership and forward-looking change.
Following a successful career in retail financial services I have spent five years assisting the South African National Treasury in objectively assessing the state of financial service access and usage in South Africa, identifying areas of concern and developing policy responses and interventions. During this time I represented South Africa in international financial inclusion forums and actively helped develop the global knowledge base to assist countries in developing their financial inclusion strategies.</p>
		  
	          <img data-info="Measurement" src="images/releof.jpg" alt="" />
		    </div>
	    
	    
	    
	    
	    
	    
	
	    
	    
	      <div>
		        <h2>Richard Chamboko </h2>
           <p>Richard Chamboko is the Measurement Manager at i2i. His areas of interest are statistical modelling, predictive analytics and survival analysis. Before joining the i2i facility, Richard spend 20 months at the Nova Information Management School in Lisbon, Portugal, taking courses and conducting research for his PhD. Richard holds a masters in Statistics and a Bachelor of Science in Mathematic and Statistics. He is also a Professional Risk Manager (PRM) certified by the Professional Risk Managers International Association (PRMIA) and an associate in the Institute of Risk Management South Africa. <br><br>
           
           Richard spent most of his career in research and statistical work in Namibia. His work supported various sectors including services, education, health and rural development, particularly helping organisations and the government to design systems to monitor their interventions. Richard was also involved in several capacity building initiatives assisting with statistical methodology, monitoring and evaluation, and impact evaluation. He has worked and consulted in various other countries including Tanzania, Zimbabwe, Botswana, India, South Africa, Austria, Switzerland and Portugal.
 
	  </p>
		  
	          <img data-info="Measurement" src="images/richard.jpg" alt="" />
		    </div>
	    
	    
	    
	    <div>
		        <h2>Michael dos Santos </h2>
          <p>Michael is the Portal Manager at i2i and has been part of the team since January 2016. Since joining i2i, Michael has focused on user interactions with large datasets, the visual clues that bring insights to decision makers and digital strategies to improve financial inclusion. He also leads the development and design of digital assets for the i2i brand. Before joining i2i, Michael worked as Interactive Director at HPG Advertising, where he gained extensive experience in interactive campaigns with blue chip companies. He has gained a few web awards and has over 15 years of experience.
 
	  </p>
		  
	          <img data-info="Data Portal" src="images/michael.jpg" alt="" />
		    </div>
		    
		
		    
          <div>
		        <h2>David Saunders </h2>
          <p>David is Knowledge Manager at Cenfri. His work has focused on packaging work on microinsurance and retail payment systems, supporting projects in Bangladesh, China, Mozambique, South Africa and Tanzania and coordinating trainings on microinsurance and National Payment Systems in Kenya, Malawi, South Africa and Zimbabwe. Before joining Cenfri as an ILO Microinsurance Innovation Facility Fellow, David worked at the ILO's Microinsurance Innovation Facility in Geneva, Switzerland, supporting the activities of the Knowledge Team. Previously, David worked as an assistant project manager at the Alliance for Financial Inclusion (AFI) in Bangkok, Thailand. David holds a Bachelor of Arts in Economics from Furman University.
 
	  </p>
		  
            <img data-info="Knowledge Management" src="images/David_sanders.jpg" alt="" />
		    </div> 
		    
		    
          <div>
		        <h2>Mari-Lise du Preez </h2>
          <p>Mari-Lise is i2i's Partnerships Manager. This gives her an opportunity to put her interest in networks and partnerships to practical use. She is interested in the social aspects of learning and innovation. Before joining i2i, Mari-Lise worked as independent consultant for clients including the Institute for Justice and Reconciliation (IJR), the Gordon Institute of Business Science (GIBS) at the University of Pretoria and the Sustainability Institute. Prior to that, she was programme manager at the South African Institute of International Affairs (SAIIA). She also lectured at UNISA. Mari-Lise holds an MA in International Studies from the University of Stellenbosch.
 
	  </p>
		  
            <img data-info="PARTNERSHIP MANAGER" src="images/mari_lisa.jpg" alt="" />
		    </div> 
		    
		    
		     <div>
		        <h2>Leonard Makuvaza</h2>
          <p>Leonard Makuvaza is a senior researcher working within i2i’s measurement team. Leonard’s primary focus at i2i is developing measurement frameworks that result in financial inclusion initiatives and thus improve welfare for low-income individuals. Leonard is an ardent development economist who has a strong interest in using market-driven approaches to achieve development outcomes. Prior to joining i2i, Leonard was working as a team leader within the United Nations Population Fund (UNFPA), focusing on programme efficiency and investment. He has also worked with the Deutsche Gesellschaft für Internationale Zusammenarbeit (GIZ) GmbH in Namibia and Zimbabwe, offering technical support to GIZ country offices in rolling out the Cost Benefit Projection Tool in private sector companies. Leonard holds a master’s degree in economics from the University of Namibia and a bachelor’s degree with honours in agricultural economics from the University of Zimbabwe.

	  </p>
		  
            <img data-info="Measurement" src="images/Leonard.jpg" alt="" />
		    </div> 
	     
		    
		    
	      <div>
		        <h2>Krista Nordin</h2>
          <p>Krista Nordin is a Senior Researcher on the Client Insights team. She has a thirst for knowledge and enjoys big-picture thinking and tinkering with complex problems. Before joining i2i, Krista was a Product Manager at Oracle for the Oracle Database. She holds a Bachelors of Science in Engineering from the Massachusetts Institute of Technology.

	  </p>
		  
            <img data-info="Client Insights" src="images/krista.jpg" alt="" />
		    </div>   
		    
		    
		    
		    
	      <div>
		        <h2>Kate Rinehart</h2>
          <p>Kate is a research analyst working within i2i’s Client Insights team. Her research predominately focuses on finding the balance between data protection and financial inclusion innovation when using client data. Before joining i2i, Kate worked as a programme coordinator for Truelift, a global trust mark that signifies commitment to enduring change for people affected by poverty. Previous to that, she helped design and launch a pilot study on child trafficking with Seva Mandir and Child Fund in Udaipur, India, as well as on a mobile health technology project in Haiti with the University of Texas Health Centre. Kate holds a bachelor of arts degree in international studies with a focus on Africa, from the Southern Methodist University in Dallas, Texas; and is currently pursuing a master’s degree in development studies from the University of Cape Town.
 
	  </p>
		  
            <img data-info="Client Insights" src="images/kate.jpg" alt="" />
		    </div> 
		    
		    
		    
		     <div>
		        <h2>Dumisani Dube</h2>
          <p>Dumisani Dube is a research associate, working in i2i’s Applications Lab team. Dumisani has a passion for helping organisations realise value in the use of data analytics and alternative sources of data in informing strategic decisions and gaining new insights. His experience cuts across business analytics, product development, customer service and sales within Telco and Mobile Financial Services. Before joining i2i, Dumisani was with Econet Wireless in the EcoCash division. He holds BSc honours and MSc degrees in operations research and statistics from the National University of Science and Technology in Zimbabwe.

	  </p>
		  
            <img data-info="Application Lab" src="images/dumi.jpg" alt="" />
		    </div> 
		    
		    
	    
	     <div>
		        <h2>Michiel Wolvers</h2>
          <p>Michiel is a research associate working within i2i’s Client Insights team. His passion is to make research relevant, insightful and actionable, with the ultimate aim to create a positive impact on reducing inequality. Michiel compliments the i2i team with his experience in data collection, analysis and project management for a wide variety of financial inclusion stakeholders.<BR><BR>
          
          Before joining i2i, Michiel worked as a consultant for CGAP on a project to increase the adoption of mobile money payments in Ghana. Prior to that, Michiel co-founded e-kulki, a mobile wallet-based savings group fintech company in Colombia, as well as acting as consultant on various projects for UNCDF, IFC, MicroSave, Enclude, amongst others. Throughout his work, Michiel aims to keep the end-user at the centre of his attention.<BR><BR>
          
          Michiel holds a master of research in international development from the University of Bath as well as a bachelor's degree in financial auditing from the University of Applied Science Utrecht.
 
	  </p>
		  
            <img data-info="Client Insights" src="images/Michiel.jpg" alt="" />
		    </div> 
	    
	    
	    
	    
	     <div>
		        <h2>Renée Hunter</h2>
          <p>Renée is a research analyst working within i2i’s Client Insights team. Her research to date has mostly focused on client centricity and data protection. Before joining i2i, Renée worked as a junior researcher at Cenfri, and before that as a junior business developer for Divitel – an independent video systems integrator. Whilst there, Renée was responsible for devising a strategic plan to enter the emerging eHealth market in Benelux and Germany. Prior to that, she worked at the South African Institute of International Affairs, where she co-authored a study on regional barriers to business in the SADC region.<BR><BR>
          
          Renée holds a bachelor's degree with honours in international relations and international organisation from the University of Groningen in the Netherlands; and is currently completing her thesis on sustainable development, for her honours degree in philosophy, politics and economics at the University of Cape Town.

	  </p>
		  
            <img data-info="Client Insights" src="images/Renee.jpg" alt="" />
		    </div> 
	    
	    
	    
	    
	    
	    
	      <div>
		        <h2>Bobby Berkowitz</h2>
          <p>Bobby is the Financial Inclusion Surveys Specialist on i2i's Data team. He works closely with specialists in Financial Sector Development Trusts (FSDs), Intermedia, The World Bank and other organisations that administer nationally representative surveys of adults and their engagement with financial services. He has over 10 years' worth of experience with nationally representative financial inclusion surveys. He has also worked at the Human Sciences Research Council (HSRC) and lectured at University of Cape Town (UCT). Bobby holds a BSocSoc in Politics, Philosophy and Economics (PPE) and a BCom (Hons) in Economics, both from the University of Cape Town.

	  </p>
		  
            <img data-info="Data4FI" src="images/bobby.jpg" alt="" />
		    </div> 
	    
	    
	    
	      <div>
		        <h2>Damola Owolade</h2>
          <p>Damola is a Researcher with i2i's Data team, where he works to support i2i's work on financial inclusion survey and geospatial data (GIS). The team seeks to identify best practices and innovations related to demand-side financial inclusion surveys and geospatial data for financial inclusion and works closely with organisations that promote the use of this data by the public and private sectors. Before joining i2i, Damola worked as research officer at Enhancing Financial Innovation and Access (EFInA) in Nigeria. Damola holds an MCOM in Econometrics from the University of Pretoria.

	  </p>
		  
            <img data-info="Data4FI" src="images/Damola.jpg" alt="" />
		    </div> 
	    
	   

	    
	    
	    
	    <div>
		        <h2>David Taylor</h2>
          <p>David is i2i's GIS Technical Advisor. David has spent 8 years offering strategic and technical support to national level mapping and data collection projects across a range of sectors. David supports public and private actors across i2i's portfolio of countries to use spatial data to analyse and develop better financial products, provide market insights and build supportive regulatory frameworks. This allows him to split his time between his twin passions of exploring and contextualising data to find new insights and helping institutions understand the value of spatial data and how it can be used to make better decisions.

	  </p>
		  
            <img data-info="Data4FI" src="images/David_taylor.jpg" alt="" />
		    </div> 
	     
	    
	       
	    <div>
		        <h2>Amanda Schoeman</h2>
          <p>Amanda joined the team in February 2016 and is working as a Personal Assistant for the i2i facility. She has extensive secretarial and administrative experience, dealing directly with ambassadors, councillors, CEOs and top management executives in the private sector and government, both local and international. She also has experience in financial, project and event management and enjoys research, technical drawings and proof-reading documents.

	  </p>
		  
            <img data-info="Data4FI" src="images/amanda.jpg" alt="" />
		    </div> 
	    
	    
	    
		    
		</section>
        
   
  <!-- i2i Team members end --> 
   
    
    <hr>
    
   <!-- Where i2i works -->    
    
    
    
    <!-- You can use this as the anchor link-->
     <a name="work"></a>    
     <!-- You can use this as the anchor link end-->  
    

	<h1>Where i2i works</h1>
    
   <div class="map_colour ">
    <img src="images/blue_map.jpg" class="img-responsive" alt="Where i2i Works">
        
      </div>
				
<hr>
    
    
    
     
  <h1 class="section-title"><span>Vision and mission</span></h1>
		<section id="slider2">
			<div>
				<h2>Vision</h2>
				<p>Policymakers, financial service providers, and financial inclusion development partners use data to make effective, evidence-based decisions that drive positive financial inclusion and welfare outcomes for all people. Data-driven policies and client-centric product design lead to financial services that respond to people’s needs who are traditionally underserved by formal financial systems. All people are able to adequately absorb economic shocks, accumulate wealth, and unlock economic opportunities through the use of financial services.</p>
                
                  <img data-info="i2i Vision" src="images/vision.jpg" alt="" />	
			</div>
			<div>
				<h2>Mission</h2>
				<p>we aim to unlock development outcomes by mobilising the data market and catalysing the generation and use of high quality, client-centric data. We accomplish this by advancing measurement frameworks, client research, and the innovative use and collection of data with the purpose of improving the effectiveness of financial inclusion policies, products, and programmes. We aim to be the leading global resource centre for financial inclusion data.</p>
                
                 <img data-info="i2i Mission" src="images/mission.jpg" alt="" />	
				
				
			</div>
            
      </section>
      
      
      
         <!-- Where i2i works end -->   
      
      
      
 
               <hr>  
               
       <!-- Advisory board -->         
               
               
               
           <!-- You can use this as the anchor link-->    
       <a name="advisory"></a>  
              <!-- You can use this as the anchor link end-->       
               
               
               
            <h1>Advisory board</h1>
            
            <p style="font-size:11px; font-style:italic">
            
            i2i’s Advisory Panel helps us to navigate a dynamic external environment. It provides a channel for ideas and perspectives from the broader financial inclusion and data landscape to inform i2i’s strategic direction and also acts as a sounding board for ideas generated from within i2i.<BR><BR>
            
            We are honoured to count the following distinguished individuals as members of our Advisory Panel:<BR>
            </p>
	
		<section id="slider3">
		    <div>
		        <h2>Gerhard Coetzee</h2>
		        <p>Gerhard Coetzee leads Customer and Provider Solutions at CGAP, where he workd on customer-centric business models, financial innovations for smallholder families and digital financial products and services beyond payments. He is also Extraordinary Professor at the University of Stellenbosch Business School. Formerly, he was Head of Inclusive Banking at Absa Bank, the founder and Director of the Centre for Inclusive Banking in Africa and Professor in Agricultural Economics at the University of Pretoria. He is published widely and worked in several countries, the majority in Africa. </p>
		 
	          <img data-info="Gerhard Coetzee" src="images/Gerald.jpg" alt="" />
		    </div>
		    <div>
		        <h2>Henri Dommel </h2>
		        <p>Henri Dommel joined UNCDF as the Director of the Financial Inclusion Practice Area in 2007. He is responsible for leading the Unit's strategy in promoting access to financial services and the development of inclusive financial sectors in least developed countries. In his position, Henri helps develop UNCDF's strategy within Inclusive Finance, as well as support UNCDF's agenda on product innovation and diversification which includes microinsurance, remittances, financial services for youth. <br><br>

Henri started his career at Banque Paribas in New Delhi and also spent time in Paris at the bank's department for Africa and the Middle East. He joined the UN system in 1992, working as Programme Manager at UNCDF until 2001. Prior to joining UNCDF again, Henri worked from 2001 to 2007 as Senior Technical Advisor for the International Fund for Agricultural Development (IFAD). <br><br>

Henri holds a Master's degree in International Affairs from the School of Advanced International Studies at Johns Hopkins University, and a degree from the Institut d'Études Politiques in Paris. 
</p>
	          <img data-info="Henri Dommel" src="images/henri.jpg" alt="" />
		    </div>
            
             <div>
		        <h2>Gilbert Gnany</h2>
		        <p>Gilbert Gnany is currently Chief Strategy Officer and Executive Director of the Mauritius Commercial Bank Group Ltd (MCB Group Ltd). He previously worked as Board Official and Senior Advisor on the World Bank Group’s Executive Board where he was responsible for issues relating mainly to the International Finance Corporation, as well as the private and financial sectors. Prior to joining the World Bank Group, he was MCB Group’s Chief Economist, after having been the Economic Advisor to the Minister of Finance in Mauritius. <br><br>

Gilbert holds a number of board and committee memberships including: (i) Chair, Statistics Advisory Council & Statistics Board of Mauritius; (ii) Chair, Stock Exchange of Mauritius (SEM); (iii) Member, Steering Committee for the setup of the Financial Services Commission of Mauritius; (iv) Director of the Board of Governors of the Mauritius Offshore Business Activities Authority & Board of Investment of Mauritius; (v) Member, IMF Advisory Group for sub-Saharan Africa (AGSA). As Executive Director of MCB Group Ltd, he also serves on the boards of several Group companies. He sits on the board of Everstone Capital Group, an Indian alternative asset manager dedicated to private equity and real estate and on the Global Advisory Board of the Singapore-based Zyfin Holdings Pte Ltd, an investment advisory and global asset management firm focused on emerging ETFs. 

</p>
	          <img data-info="Gilbert Gnany" src="images/Gilbert.jpg" alt="" />
		    </div>
            
            
            
            
               <div>
		        <h2>Fiona Greig</h2>
		        <p>Fiona Greig is the Director of Consumer Research for the JPMorgan Chase Institute. Previously, Fiona served as the Deputy Budget Director for the City of Philadelphia from 2012 through 2014 and as an Adjunct Professor at the University of Pennsylvania. Prior to that, Fiona was a consultant at McKinsey & Company for five years, consulting public and social sector clients on strategy, operations and economic development. <br><br>

In 2009 Fiona started and ran Bank on DC, a financial inclusion program for the District of Columbia. She has published on economic and public health topics in journals such as the American Economic Review and AIDS and Behaviour. Fiona was named a Rising Talent by The Women’s Forum for the Economy and Society. 

Fiona holds a Bachelor of Arts from Stanford University and a PhD in Public Policy from Harvard University. 

</p>
	          <img data-info="Fiona Greig" src="images/Fiona.jpg" alt="" />
		    </div>
            
            
            
            
            <div>
		        <h2>Leora Klapper</h2>
		        <p>Leora Klapper is a Lead Economist in the Finance and Private Sector Research Team of the Development Research Group at the World Bank. Her publications focus on corporate and household finance, entrepreneurship and risk management. Her current research studies the impact of digital financial services, especially for women. 

She is a founder of the Global Findex database, which measures how adults around the world save, borrow, make payments, and manage risk. 

Previously, she worked at the Board of Governors of the Federal Reserve System and Salomon Smith Barney. 

Leora holds a PhD in Financial Economics from New York University Stern School of Business. 

</p>
	          <img data-info="Leora Klapper" src="images/Leora.jpg" alt="" />
		    </div>
            
            
 
            
            
         <div>
		        <h2>David Porteous</h2>
		        <p>David Porteous is the Founder and Managing Director of Bankable Frontier Associates, a niche consulting firm based in Boston, Massachusetts. The firm specialises in advising public and private sector clients in the financial sector on strategy and policy. 

In previous capacities, David has been employed in an executive capacity in public, private, and public-private financial entities. All these roles have involved developing or supporting innovative approaches to the extension of financial services, including several m-banking initiatives. 

David earned a Bachelor of Commerce degree from the University of Cape Town, a Master of Philosophy from Cambridge University, and a PhD from Yale. 

</p>
	          <img data-info="David Porteous" src="images/David.jpg" alt="" />
	      </div>  
            
            
            
           <div>
		        <h2>Elisabeth Rhyne</h2>
		        <p>Elisabeth Rhyne is managing director of the Center for Financial Inclusion at Accion, a research and action centre for collaboration on challenges confronting the microfinance and financial inclusion sectors. At the Center, she co-founded the Smart Campaign, a global effort to embed client protection principles and practices throughout the microfinance industry. 

As senior vice president of Accion from 2000-2008, Elisabeth led Accion’s initial entry into Africa and India. She has published numerous articles and books on microfinance, including Microfinance for Bankers and Investors, Mainstreaming Microfinance, and The New World of Microenterprise Finance (co-editor). She was director of the Office of Microenterprise Development at the U.S. Agency for International Development from 1994 to 1998. 

Elisabeth holds a Master's and PhD in public policy from Harvard University and a bachelor's degree in history and humanities from Stanford University.


</p>
	          <img data-info="Elisabeth Rhyne" src="images/elizabeth.jpg" alt="" />
	      </div>    
              
              
              
              
       <div>
		        <h2>Piyush Tantia</h2>
		        <p>Piyush Tantia is co-Executive Director of ideas42, a social enterprise that uses insights from Behavioural Economics to invent fresh solutions to tough social problems. Since joining ideas42 in 2009 he has worked closely with leading academics from Harvard, MIT and Princeton to design and implement solutions in various areas including household finance, education, international development, poverty, criminal justice and healthcare. Along with ideas42’s co-founders, he transitioned the organization from a research initiative at Harvard University to an independent 501(c)(3) non-profit. 

Prior to joining ideas42, Piyush was a Partner in Oliver Wyman’s Retail Banking and Finance & Risk practices. During his 14 years at Oliver Wyman, he advised clients in a vast array of retail financial services businesses including consumer lending, deposits, microfinance, and serving the unbanked and underbanked. 

He has been a visiting lecturer at the Princeton Woodrow Wilson School and frequently lectures at Harvard, Wharton, MIT Sloan, Stanford and Columbia. Piyush has served on the World Economic Forum Global Agenda Council on Behaviour and the board of the MIX. He is on the executive committee for Innovation for Poverty Action’s Financial Capability Research Fund. 

Piyush holds an MPA from the Harvard Kennedy School of Government, a Bachelor of Economics from the Wharton School and a Bachelors in Computer Science from the University of Pennsylvania.



</p>
	          <img data-info="Piyush Tantia" src="images/Piyush.jpg" alt="" />
	      </div>    
                         
            
            
		
		    
		</section>
       
        
         
       <!-- Advisory board  end-->        
           
             
    
    <hr>     
               
    
      <!-- Contact i2i-->   
    
    
    
    <!-- You can use this as the anchor link-->
     <a name="contact"></a>  
     <!-- You can use this as the anchor link end-->    
    

	<h1>Contact i2i</h1>
    
    
    
   <div class="border_colour">
    	

	<form class="form-horizontal" role="form" method="post" action="index.php">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
							<?php echo "<p class='text-danger'>$errMessage</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
							<?php echo "<p class='text-danger'>$errHuman</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>	
						</div>
					</div>
	 </form> 
        
        
  
        
      </div>
      
      
     <!-- Contact i2i end-->        
      
				
<hr> 
   
    <!-- Location i2i-->  
   
    
              
  <h1>Location</h1>
    
 
    <div class="row">
      <div class="col-sm-6"> 
      <H3>FinMark Trust</H3>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3586.6462392307694!2d28.12971595095394!3d-25.979639983457503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e956e3ecd3423af%3A0xadad49c93f4b94de!2sFinmark+Trust!5e0!3m2!1sen!2sza!4v1486980681171" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>

<br><br>

  <p style="font-size:12px; font-style:italic">
First Floor, Block J East, Central Park<br>
400 16th Road (cnr New Road), Midrand, Johannesburg<br><br>
</p>

Tel: +27 11 315 9197<br>
<a href="mailto:info@finmarktrust.org">info@finmarktrust.org</a>

 </div>
       <div class="row">
      <div class="col-sm-6">
     <H3>Cenfri</H3>
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3313.3271186406455!2d18.623429551111794!3d-33.855459580565004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1dcc57517431becf%3A0xb602e69f03fc6860!2s99+Jip+De+Jager+Dr%2C+De+Bron%2C+Cape+Town%2C+7530!5e0!3m2!1sen!2sza!4v1486980774262" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    
     <br><br>
<p style="font-size:12px; font-style:italic">
The Vineyards Office Estate Farm, Farm 1, Block A Building<br>
99 Jip de Jager Drive Bellville, Cape Town<br><br>
</p>

Tel: +27 21 913 9510<br>
<a href="mailto:info@cenfri.org">info@cenfri.org</a>

     
     
     
      </div>
    </div>

	
    <!-- Location i2i end-->  				
										
<hr>
  
  
  </div>    
  
</div>

<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> -->
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>

<!-- <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> -->
<script src="js/bootstrap-3.3.5.js" type="text/javascript"></script>

<script type="text/javascript" src="js/sliderShowcase.js"></script>

<script type="text/javascript">
	$(function() {
        $('#slider').SliderShowcase({
			autoPlay: false,
		
		});
		 $('#slider3').SliderShowcase({
			autoPlay: false,
			slide: 'vertical'
			
		
		});
		
		$('#slider2').SliderShowcase({
			autoPlay: true,
			slide: 'horizontal'
		});
	});
</script>
</body>
</html>
