#Weekly Log Week 9

So I have still been continuing to work on attempting to send my database from MyPHPAdmin into a PDF file. I was attempting to go about it by just creating it on a web page but I did not like the way it was working. I stumbled upon FPDF which is used to dynamically create a PDF that I can decide what will be the headers. 

Something that I worry about is that if the user selects more than a single report, will FPDF actually create all of the files or will it end up only creating the first one and then return and not create the others after.