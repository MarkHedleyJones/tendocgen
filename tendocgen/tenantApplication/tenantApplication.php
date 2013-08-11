\documentclass[10pt,oneside,british]{scrbook}
\renewcommand{\rmdefault}{cmr}
\usepackage[scaled=0.92]{helvet}
\renewcommand{\familydefault}{\sfdefault}
\usepackage[T1]{fontenc}
\usepackage[utf8]{inputenc}
\usepackage[a4paper]{geometry}
\geometry{verbose,tmargin=0cm,bmargin=0cm,lmargin=2cm,rmargin=2cm}
\usepackage{fancyhdr}
\pagestyle{fancy}
\setcounter{secnumdepth}{3}
\setcounter{tocdepth}{3}
\usepackage{amssymb}

\makeatletter

\providecommand{\tabularnewline}{\\}

\lhead{www.houser.co.nz}

\makeatother

\usepackage{babel}
\begin{document}

\chapter*{TENANCY APPLICATION}

\noindent for: \textbf{\large <?php echo ($data['tenancyAddress'] != False ? $data['tenancyAddress'] : '\rule{165mm}{0.6pt}'); ?>}{\large \par}

\noindent The information you provide is used and held in line with
the New Zealand Privacy Act 1993.


\section*{Applicant:}
\begin{itemize}
\item \textbf{Name: }%
\begin{tabular}{cc}
Surname: \rule{150pt}{0.6pt} & First names: \rule{162pt}{0.6pt}\tabularnewline
\end{tabular}
\item \textbf{Contact details:}\vspace{4mm}
\\
\begin{tabular}{ccc}
Phone: \rule{100pt}{0.6pt} & Cell: \rule{100pt}{0.6pt} & Email: \rule{145pt}{0.6pt}\tabularnewline
\end{tabular}\vspace{1mm}

\item \textbf{Current address: }\rule{380pt}{0.6pt}
\item \textbf{How long have you lived there? }%
\begin{tabular}{cc}
Years: \rule{50pt}{0.6pt} & Months: \rule{50pt}{0.6pt}\tabularnewline
\end{tabular}
\item \textbf{Reason for leaving current address:} \rule{299pt}{0.6pt}
\end{itemize}

\section*{Identification:}
\begin{itemize}
\item \textbf{Photo identification provided:}%
\begin{tabular}{cc}
$\square$ Drivers licence & $\square$ Passport\tabularnewline
\end{tabular}
\item \textbf{Drivers licence / passport number:} \rule{150pt}{0.6pt}
\item \textbf{Vehicle:}\vspace{2mm}
\\
\begin{tabular}{cc}
Registration number: \rule{100pt}{0.6pt} & Make \& model: \rule{187pt}{0.6pt}\tabularnewline
\end{tabular}
\item \textbf{Alternate identification:} (i.e.Trademe username) \rule{252pt}{0.6pt}
\end{itemize}

\section*{Referees:}
\begin{itemize}
\item \textbf{Current / previous landlord: \enskip{} }$\square$ I agree
to this referee being contacted\vspace{2mm}
\\
\begin{tabular}{cc}
Name: \rule{200pt}{0.6pt} & Phone: \rule{62mm}{0.6pt}\tabularnewline[2mm]
Email: \rule{200pt}{0.6pt} & Mobile: \rule{62mm}{0.6pt}\tabularnewline[2mm]
\end{tabular}
\item \textbf{Referee 1: }- This referee may be contacted\textbf{ }\vspace{2mm}
\\
\begin{tabular}{cc}
Name: \rule{200pt}{0.6pt} & Phone: \rule{62mm}{0.6pt}\tabularnewline[2mm]
Email: \rule{200pt}{0.6pt} & Mobile: \rule{62mm}{0.6pt}\tabularnewline[2mm]
\end{tabular}
\item \textbf{Referee 2:} - This referee may be contacted\vspace{2mm}
\\
\begin{tabular}{cc}
Name: \rule{200pt}{0.6pt} & Phone: \rule{62mm}{0.6pt}\tabularnewline[2mm]
Email: \rule{200pt}{0.6pt} & Mobile: \rule{62mm}{0.6pt}\tabularnewline[2mm]
\end{tabular}
\end{itemize}

\section*{Signature:}
\begin{itemize}
\item I am aware that this information may be used in the granting, continuation,
or termination of a tenancy and for follow up of any outstanding matters
(arrears, damage, disposal of goods etc.) resulting at the end of
a tenancy.
\item I agree that the information I have given can be used to obtain personal
information from a credit reporting agency, and personal references
on me.
\item I consent to this information being provided to any credit reporting
agency for the purposes of enforcing any judgement order regarding
any tenancy I may be granted. I am also aware that this information
may become available to the public through the credit reporting agencies
database.
\end{itemize}
\vspace{8mm}


\begin{tabular}{ccc}
Applicants name: \rule{150pt}{0.6pt} &  & Signature: \rule{174pt}{0.6pt}\tabularnewline
\end{tabular}
\end{document}
