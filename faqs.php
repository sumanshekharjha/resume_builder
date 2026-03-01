<?php 
session_start();
include("header.php");  
?>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .faq-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .faq-contaner h2 {
            text-align: center;
            color: #01070f;
            margin-bottom: 30px;
        }

        .faq-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-bottom: 15px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .faq-item h3 {
            margin-top: 0;
            color: #010b15;
            cursor: pointer;
        }

        .faq-item p {
            margin-bottom: 0;
            display: none;
        }

        .faq-item.active p {
            display: block;
        }
    </style>
</head>
<body>
    <section class="faq-container">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-item">
            <h3>What is a Smart Resume?</h3>
            <p>
                Smart resume is an online resume builder tool that helps you create a professional
                resume quickly and easily. It provides templates, examples, and formatting
                tools to ensure your resume looks polished and is easy to read.
            </p>
        </div>
        <div class="faq-item">
            <h3>Is it free to use your Smart Resume?</h3>
            <p>
                We offer a free version with basic features. For full access to all our
                templates, advanced tools, and premium features, you can upgrade to one of
                our subscription plans.
            </p>
        </div>
        <div class="faq-item">
            <h3>Do I need to download any software to use the Smart Resume?</h3>
            <p>
                No, our resume builder is a web-based application. You can access it from
                any browser on your computer, tablet, or smartphone.
            </p>
        </div>
        <div class="faq-item">
            <h3>How do I create a new resume?</h3>
            <p>
                After signing up, you can click on the "Get Started" button. You'll be
                guided through a step-by-step process where you can select a template and fill in your information.
            </p>
        </div>
        <div class="faq-item">
            <h3>How do I download my completed resume?</h3>
            <p>
                Once you are finished, you can click the "Download" button.
                Your resume will be downloaded in pdf format.
            </p>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const faqItems = document.querySelectorAll(".faq-item h3");

            faqItems.forEach((item) => {
                item.addEventListener("click", () => {
                    const parent = item.parentElement;
                    parent.classList.toggle("active");
                });
            });
        });
    </script>

<?php include("footer.php"); ?>