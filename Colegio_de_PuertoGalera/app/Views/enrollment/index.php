<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrance Exam Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        #formContainer {
            width: 90%;
            max-width: 700px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 20px auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .radio-container {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .radio-container input[type="radio"] {
            margin-right: 5px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    
    <div id="formContainer" class="container">
        <h2>Entrance Exam Form</h2>
        <form id="examForm" action="/submitExam" method="post">

        <div class="form-section active" id="section1">
        <h3>Personal Data</h3>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="FirstName" class="form-control" required>
        </div>
        <div class="form-group col-md-4">
            <label for="middle_name">Middle Name:</label>
            <input type="text" id="middle_name" name="MiddleName" class="form-control" required>
        </div>
        <div class="form-group col-md-4">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="LastName" class="form-control" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="DateOfBirth" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label for="gender">Gender:</label>
            <select id="gender" name="Gender" class="form-control" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="Email" class="form-control" required>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
        <label for="nationality">Nationality:</label>
        <select id="nationality" name="Nationality" class="form-control" required>
            <option value="">Select Nationality</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="religion">Religion:</label>
        <select id="religion" name="Religion" class="form-control" required>
            <option value="">Select Religion</option>
            <!-- You need to populate this dropdown with religion data -->
        </select>
    </div>
</div>
    <div class="form-group">
        <label for="place_of_birth">Place of Birth:</label>
        <input type="text" id="place_of_birth" name="PlaceOfBirth" class="form-control" required>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
        <label for="civil_status">Civil Status:</label>
        <select id="civil_status" name="CivilStatus" class="form-control" required>
            <option value="">Select Civil Status</option>
            <option value="Married">Married</option>
            <option value="Single">Single</option>
            <option value="Divorced">Divorced</option>
            <option value="Widowed">Widowed</option>
        </select>
    </div>
        <div class="form-group col-md-6">
            <label for="contact_number">Contact Number:</label>
            <input type="tel" id="contact_number" name="ContactNumber" class="form-control" placeholder="+63 0000 0000 000" required>
        </div>
    </div>
</div>



            <div class="form-section" id="section2">
                <h3>General Education</h3>
            <label>   Choose the correct answer.</label><br><br>

    <label for="q1">1. What is the primary goal of general education?</label><br>
    <input type="radio" name="q1" value="A"> A) Specialized skills<br>
    <input type="radio" name="q1" value="B"> B) Broad knowledge base<br>
    <input type="radio" name="q1" value="C"> C) Physical fitness<br>
    <input type="radio" name="q1" value="D"> D) Artistic talent<br><br>

    <label for="q2">2. Which subject is commonly included in a general education curriculum to enhance critical thinking skills?</label><br>
    <input type="radio" name="q2" value="A"> A) Mathematics<br>
    <input type="radio" name="q2" value="B"> B) History<br>
    <input type="radio" name="q2" value="C"> C) Physical Education<br>
    <input type="radio" name="q2" value="D"> D) Music<br><br>

    <label for="q3">3. In the context of general education, what does STEM stand for?</label><br>
    <input type="radio" name="q3" value="A"> A) Social Studies, Technology, Engineering, Mathematics<br>
    <input type="radio" name="q3" value="B"> B) Science, Technology, Engineering, Mathematics<br>
    <input type="radio" name="q3" value="C"> C) Sports, Theology, English, Medicine<br>
    <input type="radio" name="q3" value="D"> D) Sociology, Theater, Economics, Music<br><br>

    <label for="q4">4. What is the purpose of including humanities courses in a general education program?</label><br>
    <input type="radio" name="q4" value="A"> A) Develop scientific skills<br>
    <input type="radio" name="q4" value="B"> B) Explore human experiences and cultures<br>
    <input type="radio" name="q4" value="C"> C) Enhance athletic abilities<br>
    <input type="radio" name="q4" value="D"> D) Master technical skills<br><br>

    <label for="q5">5. Which of the following is a key component of interdisciplinary studies in general education?</label><br>
    <input type="radio" name="q5" value="A"> A) Specialized focus<br>
    <input type="radio" name="q5" value="B"> B) Narrow perspective<br>
    <input type="radio" name="q5" value="C"> C) Integration of multiple disciplines<br>
    <input type="radio" name="q5" value="D"> D) Exclusion of arts<br><br>

    <label for="q6">6. How does general education contribute to lifelong learning?</label><br>
    <input type="radio" name="q6" value="A"> A) By focusing solely on career-specific skills<br>
    <input type="radio" name="q6" value="B"> B) By providing a foundation for continuous intellectual growth<br>
    <input type="radio" name="q6" value="C"> C) By discouraging curiosity and exploration<br>
    <input type="radio" name="q6" value="D"> D) By promoting isolation from diverse ideas<br><br>

    <label for="q7">7. Which skill is often emphasized in general education courses to foster effective communication?</label><br>
    <input type="radio" name="q7" value="A"> A) Technical proficiency<br>
    <input type="radio" name="q7" value="B"> B) Artistic talent<br>
    <input type="radio" name="q7" value="C"> C) Critical thinking<br>
    <input type="radio" name="q7" value="D"> D) Interpersonal skills<br><br>

    <label for="q8">8. What role do social sciences play in general education?</label><br>
    <input type="radio" name="q8" value="A"> A) Ignoring societal dynamics<br>
    <input type="radio" name="q8" value="B"> B) Analyzing human behavior and societies<br>
    <input type="radio" name="q8" value="C"> C) Focusing solely on individual development<br>
    <input type="radio" name="q8" value="D"> D) Disregarding cultural diversity<br><br>

    <label for="q9">9. Why is cultural competence important in a general education context?</label><br>
    <input type="radio" name="q9" value="A"> A) It hinders effective communication<br>
    <input type="radio" name="q9" value="B"> B) It promotes understanding of diverse perspectives<br>
    <input type="radio" name="q9" value="C"> C) It limits personal growth<br>
    <input type="radio" name="q9" value="D"> D) It prioritizes individualism over collaboration<br><br>

    <label for="q10">10. How does general education contribute to the development of ethical reasoning?</label><br>
    <input type="radio" name="q10" value="A"> A) By avoiding ethical discussions<br>
    <input type="radio" name="q10" value="B"> B) By emphasizing only technical skills<br>
    <input type="radio" name="q10" value="C"> C) By engaging students in ethical dilemmas and discussions<br>
    <input type="radio" name="q10" value="D"> D) By discouraging critical thinking<br><br>
</div>

<div class="form-section" id="section3">
    <h3>Psychology</h3>
    <label>   Choose the correct answer.</label><br><br>

    <label for="q11">1. What is the fundamental concept behind classical conditioning in psychology?</label><br>
    <input type="radio" name="q11" value="A"> A) Operant learning<br>
    <input type="radio" name="q11" value="B"> B) Associative learning<br>
    <input type="radio" name="q11" value="C"> C) Observational learning<br><br>
    

    <label for="q12">2. Explain the nature versus nurture debate and its significance in understanding human development.</label><br>
    <input type="radio" name="q12" value="A"> A) Genetic determinism<br>
    <input type="radio" name="q12" value="B"> B) Inherited traits<br>
    <input type="radio" name="q12" value="C"> C) Interaction of genes and environment<br><br>
    

    <label for="q13">3. Describe the bystander effect and provide an example illustrating its impact on helping behavior.</label><br>
    <input type="radio" name="q13" value="A"> A) Increased helping in groups<br>
    <input type="radio" name="q13" value="B"> B) Decreased helping in groups<br>
    <input type="radio" name="q13" value="C"> C) No effect on helping behavior<br><br>
   

    <label for="q14">4. How does the concept of cognitive dissonance contribute to our understanding of attitude change?</label><br>
    <input type="radio" name="q14" value="A"> A) Reinforcing existing attitudes<br>
    <input type="radio" name="q14" value="B"> B) Resolving conflicting attitudes<br>
    <input type="radio" name="q14" value="C"> C) Ignoring attitudes<br><br>
    

    <label for="q15">5. Discuss the major components of Maslow's hierarchy of needs and their relevance to motivation.</label><br>
    <input type="radio" name="q15" value="A"> A) Physiological, safety, and self-actualization<br>
    <input type="radio" name="q15" value="B"> B) Safety, love, and esteem<br>
    <input type="radio" name="q15" value="C"> C) Physiological, love, and esteem<br><br>
    

    <label for="q16">6. Explain the concept of operant conditioning and provide real-world examples of positive and negative reinforcement.</label><br>
    <input type="radio" name="q16" value="A"> A) Strengthening behavior (positive reinforcement), weakening behavior (negative reinforcement)<br>
    <input type="radio" name="q16" value="B"> B) Weakening behavior (positive reinforcement), strengthening behavior (negative reinforcement)<br>
    <input type="radio" name="q16" value="C"> C) Strengthening behavior (positive reinforcement), strengthening behavior (negative reinforcement)<br><br>
    

    <label for="q17">7. What is the purpose of the Stanford Prison Experiment, and what ethical concerns were raised during its execution?</label><br>
    <input type="radio" name="q17" value="A"> A) Studying group dynamics; lack of informed consent and psychological harm<br>
    <input type="radio" name="q17" value="B"> B) Investigating memory; lack of confidentiality and social desirability<br>
    <input type="radio" name="q17" value="C"> C) Examining perception; lack of debriefing and deception<br><br>
    

    <label for="q18">8. Define the concept of social identity theory and its role in shaping intergroup behavior.</label><br>
    <input type="radio" name="q18" value="A"> A) Personal identity; individual behavior<br>
    <input type="radio" name="q18" value="B"> B) Social identity; group behavior<br>
    <input type="radio" name="q18" value="C"> C) Collective identity; societal behavior<br><br>
    

    <label for="q19">9. Discuss the characteristics and potential causes of various anxiety disorders in psychology.</label><br>
    <input type="radio" name="q19" value="A"> A) Bipolar disorder; genetic factors<br>
    <input type="radio" name="q19" value="B"> B) Obsessive-Compulsive Disorder (OCD); environmental factors<br>
    <input type="radio" name="q19" value="C"> C) Generalized Anxiety Disorder (GAD); biological and environmental factors<br><br>
    

    <label for="q20">10. Explore the stages of Erik Erikson's psychosocial development theory and their impact on human personality.</label><br>
    <input type="radio" name="q20" value="A"> A) Trust vs. mistrust, industry vs. inferiority, integrity vs. despair<br>
    <input type="radio" name="q20" value="B"> B) Autonomy vs. shame and doubt, identity vs. role confusion, generativity vs. stagnation<br>
    <input type="radio" name="q20" value="C"> C) Initiative vs. guilt, intimacy vs. isolation, integrity vs. despair<br><br>
    
</div>

<div class="form-section" id="section4">
    <h3>Mathematics</h3>
    <label>   Choose the correct answer.</label><br><br>

    <label for="q21">1. What is the sum of angles in a triangle?</label><br>
    <input type="radio" name="q21" value="A"> A) 90 degrees<br>
    <input type="radio" name="q21" value="B"> B) 180 degrees<br>
    <input type="radio" name="q21" value="C"> C) 270 degrees<br><br>

    <label for="q22">2. In a rectangle, opposite sides are:</label><br>
    <input type="radio" name="q22" value="A"> A) Equal<br>
    <input type="radio" name="q22" value="B"> B) Perpendicular<br>
    <input type="radio" name="q22" value="C"> C) Parallel<br><br>

    <label for="q23">3. What is the value of π (pi) approximately?</label><br>
    <input type="radio" name="q23" value="A"> A) 3.14<br>
    <input type="radio" name="q23" value="B"> B) 2.71<br>
    <input type="radio" name="q23" value="C"> C) 1.618<br><br>

    <label for="q24">4. The formula for the area of a circle is:</label><br>
    <input type="radio" name="q24" value="A"> A) πr^2<br>
    <input type="radio" name="q24" value="B"> B) 2πr<br>
    <input type="radio" name="q24" value="C"> C) πd<br><br>

    <label for="q25">5. A right-angled triangle has an angle of:</label><br>
    <input type="radio" name="q25" value="A"> A) 60 degrees<br>
    <input type="radio" name="q25" value="B"> B) 90 degrees<br>
    <input type="radio" name="q25" value="C"> C) 120 degrees<br><br>

    <label for="q26">6. What is the perimeter of a square with side length 's'?</label><br>
    <input type="radio" name="q26" value="A"> A) s<br>
    <input type="radio" name="q26" value="B"> B) 2s<br>
    <input type="radio" name="q26" value="C"> C) 4s<br><br>

    <label for="q27">7. The slope-intercept form of a linear equation is:</label><br>
    <input type="radio" name="q27" value="A"> A) y = mx + b<br>
    <input type="radio" name="q27" value="B"> B) ax^2 + bx + c = 0<br>
    <input type="radio" name="q27" value="C"> C) y = a/x<br><br>

    <label for="q28">8. The sum of two complementary angles is always:</label><br>
    <input type="radio" name="q28" value="A"> A) 90 degrees<br>
    <input type="radio" name="q28" value="B"> B) 180 degrees<br>
    <input type="radio" name="q28" value="C"> C) 360 degrees<br><br>

    <label for="q29">9. What is the volume of a rectangular prism with length 'L', width 'W', and height 'H'?</label><br>
    <input type="radio" name="q29" value="A"> A) LW<br>
    <input type="radio" name="q29" value="B"> B) LWH<br>
    <input type="radio" name="q29" value="C"> C) 2L + 2W + 2H<br><br>

    <label for="q30">10. The quadratic formula for solving ax^2 + bx + c = 0 is:</label><br>
    <input type="radio" name="q30" value="A"> A) x = (-b ± √(b^2 - 4ac)) / 2a<br>
    <input type="radio" name="q30" value="B"> B) x = -b / a<br>
    <input type="radio" name="q30" value="C"> C) x = a + b + c<br><br>
</div>





<div class="form-section" id="section5">
    <h3>History of Puerto Galera</h3>
    <label>   Choose the correct answer.</label><br><br>

    <label for="q31">1. In what year was Puerto Galera officially declared a UNESCO Man and the Biosphere Reserve?</label><br>
    <input type="radio" name="q31" value="A"> A) 1980<br>
    <input type="radio" name="q31" value="B"> B) 1992<br>
    <input type="radio" name="q31" value="C"> C) 2003<br>
    <input type="radio" name="q31" value="D"> D) 2015<br><br>

    <label for="q32">2. Which ancient civilization left evidence of their presence in Puerto Galera through archaeological finds?</label><br>
    <input type="radio" name="q32" value="A"> A) Greek<br>
    <input type="radio" name="q32" value="B"> B) Chinese<br>
    <input type="radio" name="q32" value="C"> C) Roman<br>
    <input type="radio" name="q32" value="D"> D) Persian<br><br>

    <label for="q33">3. What is the significance of the name "Puerto Galera" in Spanish?</label><br>
    <input type="radio" name="q33" value="A"> A) Beautiful Port<br>
    <input type="radio" name="q33" value="B"> B) Hidden Harbor<br>
    <input type="radio" name="q33" value="C"> C) Rich City<br>
    <input type="radio" name="q33" value="D"> D) Peaceful Cove<br><br>

    <label for="q34">4. Which historical figure is associated with the establishment of Puerto Galera as a safe harbor for Spanish galleons?</label><br>
    <input type="radio" name="q34" value="A"> A) Ferdinand Magellan<br>
    <input type="radio" name="q34" value="B"> B) Miguel López de Legazpi<br>
    <input type="radio" name="q34" value="C"> C) Christopher Columbus<br>
    <input type="radio" name="q34" value="D"> D) Hernán Cortés<br><br>

    <label for="q35">5. During World War II, which country occupied Puerto Galera and used it as a strategic naval base?</label><br>
    <input type="radio" name="q35" value="A"> A) Japan<br>
    <input type="radio" name="q35" value="B"> B) Germany<br>
    <input type="radio" name="q35" value="C"> C) United States<br>
    <input type="radio" name="q35" value="D"> D) Australia<br><br>

    <label for="q36">6. What is the annual celebration held in Puerto Galera that commemorates the landing of St. John the Baptist in the area?</label><br>
    <input type="radio" name="q36" value="A"> A) Ati-Atihan Festival<br>
    <input type="radio" name="q36" value="B"> B) Moriones Festival<br>
    <input type="radio" name="q36" value="C"> C) Mangyan Festival<br>
    <input type="radio" name="q36" value="D"> D) Malasimbo Festival<br><br>

    <label for="q37">7. Puerto Galera is known for its vibrant marine life. Which marine park within its vicinity is famous for snorkeling and diving?</label><br>
    <input type="radio" name="q37" value="A"> A) Tamaraw Falls Marine Park<br>
    <input type="radio" name="q37" value="B"> B) Verde Island Passage Marine Corridor<br>
    <input type="radio" name="q37" value="C"> C) Halcones Marine Sanctuary<br>
    <input type="radio" name="q37" value="D"> D) Sabang Bay Marine Reserve<br><br>

    <label for="q38">8. Which indigenous group is native to Puerto Galera, known for their distinct culture and craftsmanship?</label><br>
    <input type="radio" name="q38" value="A"> A) Igorot<br>
    <input type="radio" name="q38" value="B"> B) Mangyan<br>
    <input type="radio" name="q38" value="C"> C) Aeta<br>
    <input type="radio" name="q38" value="D"> D) T'boli<br><br>

    <label for="q39">9. Puerto Galera played a crucial role in the Manila-Acapulco Galleon Trade. What goods were primarily traded during this historical period?</label><br>
    <input type="radio" name="q39" value="A"> A) Spices<br>
    <input type="radio" name="q39" value="B"> B) Silk<br>
    <input type="radio" name="q39" value="C"> C) Gold<br>
    <input type="radio" name="q39" value="D"> D) Porcelain<br><br>

    <label for="q40">10. What is the predominant religion practiced in Puerto Galera?</label><br>
    <input type="radio" name="q40" value="A"> A) Buddhism<br>
    <input type="radio" name="q40" value="B"> B) Hinduism<br>
    <input type="radio" name="q40" value="C"> C) Christianity<br>
    <input type="radio" name="q40" value="D"> D) Islam<br><br>

    <!-- Question 11 (New Question) -->
    <label for="q41">11. What is the main economic activity in Puerto Galera?</label><br>
    <input type="radio" name="q41" value="A"> A) Fishing<br>
    <input type="radio" name="q41" value="B"> B) Agriculture<br>
    <input type="radio" name="q41" value="C"> C) Tourism<br>
    <input type="radio" name="q41" value="D"> D) Manufacturing<br><br>

        <!-- Question 12 (New Question) -->
    <label for="q42">12. What is the traditional boat used for fishing in Puerto Galera?</label><br>
    <input type="radio" name="q42" value="A"> A) Bangka<br>
    <input type="radio" name="q42" value="B"> B) Kayak<br>
    <input type="radio" name="q42" value="C"> C) Canoe<br>
    <input type="radio" name="q42" value="D"> D) Yacht<br><br>

    <!-- Question 13 (New Question) -->
    <label for="q43">13. Which famous diving spot is located near Puerto Galera?</label><br>
    <input type="radio" name="q43" value="A"> A) Anilao<br>
    <input type="radio" name="q43" value="B"> B) Boracay<br>
    <input type="radio" name="q43" value="C"> C) El Nido<br>
    <input type="radio" name="q43" value="D"> D) Malapascua<br><br>

    <!-- Question 14 (New Question) -->
    <label for="q44">14. What is the primary language spoken in Puerto Galera?</label><br>
    <input type="radio" name="q44" value="A"> A) Tagalog<br>
    <input type="radio" name="q44" value="B"> B) English<br>
    <input type="radio" name="q44" value="C"> C) Spanish<br>
    <input type="radio" name="q44" value="D"> D) Mandarin<br><br>

    <!-- Question 15 (New Question) -->
    <label for="q45">15. Which environmental organization actively participates in preserving Puerto Galera's marine biodiversity?</label><br>
    <input type="radio" name="q45" value="A"> A) WWF<br>
    <input type="radio" name="q45" value="B"> B) Greenpeace<br>
    <input type="radio" name="q45" value="C"> C) UNESCO<br>
    <input type="radio" name="q45" value="D"> D) Red Cross<br><br>

    <!-- Question 16 (New Question) -->
<label for="q46">16. What is the famous underwater cave system in Puerto Galera called?</label><br>
<input type="radio" name="q46" value="A"> A) Crystal Cave<br>
<input type="radio" name="q46" value="B"> B) Bat Cave<br>
<input type="radio" name="q46" value="C"> C) Secret Cave<br>
<input type="radio" name="q46" value="D"> D) Treasure Cave<br><br>

<!-- Question 17 (New Question) -->
<label for="q47">17. Which local delicacy is a must-try when visiting Puerto Galera?</label><br>
<input type="radio" name="q47" value="A"> A) Sinigang<br>
<input type="radio" name="q47" value="B"> B) Adobo<br>
<input type="radio" name="q47" value="C"> C) Kinilaw<br>
<input type="radio" name="q47" value="D"> D) Lechon<br><br>

<!-- Question 18 (New Question) -->
<label for="q48">18. What is the name of the popular beach in Puerto Galera known for its vibrant nightlife?</label><br>
<input type="radio" name="q48" value="A"> A) White Beach<br>
<input type="radio" name="q48" value="B"> B) Sabang Beach<br>
<input type="radio" name="q48" value="C"> C) Talipanan Beach<br>
<input type="radio" name="q48" value="D"> D) Aninuan Beach<br><br>

<!-- Question 19 (New Question) -->
<label for="q49">19. Which mountain range overlooks Puerto Galera and offers hiking and trekking opportunities?</label><br>
<input type="radio" name="q49" value="A"> A) Sierra Madre<br>
<input type="radio" name="q49" value="B"> B) Mount Makiling<br>
<input type="radio" name="q49" value="C"> C) Mount Apo<br>
<input type="radio" name="q49" value="D"> D) Mount Pinatubo<br><br>

<!-- Question 20 (New Question) -->
<label for="q50">20. What is the most popular water sport activity in Puerto Galera?</label><br>
<input type="radio" name="q50" value="A"> A) Snorkeling<br>
<input type="radio" name="q50" value="B"> B) Surfing<br>
<input type="radio" name="q50" value="C"> C) Jet Skiing<br>
<input type="radio" name="q50" value="D"> D) Parasailing<br><br>

</div>


<div class="button-container">
    <button type="button" id="prevButton" onclick="prevSection()" class="btn btn-secondary" style="display: none;">Previous</button>
    <button type="button" id="nextButton" onclick="nextSection()" class="btn btn-primary">Next</button>
    <button type="submit" id="submitButton" class="btn btn-success" style="display: none;">Submit</button>
</div>
</form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('examForm');
    const sections = form.querySelectorAll('.form-section');
    let currentSectionIndex = 0;

    function showSection(index) {
        sections.forEach((section, i) => {
            if (i === index) {
                section.classList.add('active');
            } else {
                section.classList.remove('active');
            }
        });
        if (index === 0) {
            document.getElementById('prevButton').style.display = 'none';
            document.getElementById('nextButton').style.display = 'block';
            document.getElementById('submitButton').style.display = 'none';
        } else if (index > 0 && index < sections.length - 1) {
            document.getElementById('prevButton').style.display = 'block';
            document.getElementById('nextButton').style.display = 'block';
            document.getElementById('submitButton').style.display = 'none';
        } else if (index === sections.length - 1) {
            document.getElementById('prevButton').style.display = 'block';
            document.getElementById('nextButton').style.display = 'none';
            document.getElementById('submitButton').style.display = 'block';
        }
    }

    function prevSection() {
        if (currentSectionIndex > 0) {
            currentSectionIndex--;
            showSection(currentSectionIndex);
        }
    }

    function validateCurrentSection() {
    const currentSection = sections[currentSectionIndex];
    const inputs = currentSection.querySelectorAll('input[type="text"], input[type="date"], input[type="email"], input[type="tel"], select');
    let radioButtons = [];
    let radioChecked = false;

    // Check if all text, date, email, tel, and select inputs are filled
    for (let i = 0; i < inputs.length; i++) {
        if (!inputs[i].value) {
            // Display an alert or error message to prompt the user to fill out all fields
            alert('Please fill out all fields before proceeding.');
            return false;
        }
    }

    // If current section is 2, 3, 4, or 5, find radio buttons
    if (currentSectionIndex >= 1 && currentSectionIndex <= 4) {
        radioButtons = currentSection.querySelectorAll('input[type="radio"]');
        // Check if at least one radio button is checked
        for (let i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked) {
                radioChecked = true;
                break;
            }
        }

        if (!radioChecked) {
            // Display an alert or error message to prompt the user to answer the radio button question
            alert('Please answer the radio button question before proceeding.');
            return false;
        }
    }

    return true;
}



function nextSection() {
    if (currentSectionIndex < sections.length - 1) {
        // Validate the current section before proceeding
        if (validateCurrentSection()) {
            // If the current section is 2, 3, 4, or 5, check if all radio button questions are answered
            if (currentSectionIndex >= 1 && currentSectionIndex <= 4) {
                const currentSection = sections[currentSectionIndex];
                const radioGroups = currentSection.querySelectorAll('input[type="radio"]');
                let allRadioChecked = true;

                // Check each radio group
                radioGroups.forEach(radio => {
                    const groupName = radio.getAttribute('name');
                    const radioGroup = currentSection.querySelectorAll(`input[type="radio"][name="${groupName}"]`);
                    let radioChecked = false;
                    
                    // Check if at least one option is selected in the group
                    radioGroup.forEach(radioOption => {
                        if (radioOption.checked) {
                            radioChecked = true;
                        }
                    });

                    // If no option is selected in any group, set allRadioChecked to false
                    if (!radioChecked) {
                        allRadioChecked = false;
                    }
                });

                // If all radio questions are not answered, prevent advancement to the next section
                if (!allRadioChecked) {
                    alert('Please answer all questions before proceeding.');
                    return;
                }
            }
            
            // Proceed to the next section
            currentSectionIndex++;
            showSection(currentSectionIndex);
            // Scroll to the top of the next section
            sections[currentSectionIndex].scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
}



    function submitExam() {
        // You can implement form submission logic here
        form.submit();
    }

    // Show the first section initially
    showSection(currentSectionIndex);

    // Event listeners for navigation buttons
    document.getElementById('prevButton').addEventListener('click', prevSection);
    document.getElementById('nextButton').addEventListener('click', nextSection);
    document.getElementById('submitButton').addEventListener('click', submitExam);
});

  // Fetch nationality data from REST Countries API
    fetch('https://restcountries.com/v3.1/all')
        .then(response => response.json())
        .then(data => {
            // Sort the nationality data alphabetically
            data.sort((a, b) => a.name.common.localeCompare(b.name.common));

            const nationalityDropdown = document.getElementById('nationality');
            data.forEach(country => {
                const option = document.createElement('option');
                option.value = country.name.common;
                option.textContent = country.name.common;
                nationalityDropdown.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching nationality data:', error));

                // Define an array of common religions
            const religions = ["Christianity", "Islam", "Hinduism", "Buddhism", "Sikhism", "Judaism", "Bahá'í", "Jainism", "Shinto", "Taoism"];

        // Populate the religion dropdown
        const religionDropdown = document.getElementById('religion');
        religions.forEach(religion => {
            const option = document.createElement('option');
            option.value = religion;
            option.textContent = religion;
            religionDropdown.appendChild(option);
        });


</script>

</body>
</html>