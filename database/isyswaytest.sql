-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2025 at 02:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isyswaytest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `email`, `password`) VALUES
(1, 'admin@isysway.com', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `aws_questions`
--

CREATE TABLE `aws_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aws_questions`
--

INSERT INTO `aws_questions` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `created_at`) VALUES
(1, 'Which AWS service is used to store objects such as files, images, and videos in a highly durable and', 'EC2', 'RDS', 'S3', 'Lambda', 'S3', '2025-07-02 11:40:13'),
(2, 'Which AWS service provides virtual servers in the cloud allowing you to run applications on virtual ', 'Lambda', 'EC2', 'DynamoDB', 'SNS', 'EC2', '2025-07-02 11:40:13'),
(3, 'Which AWS service is a managed relational database service supporting engines like MySQL, PostgreSQL', 'RDS', 'S3', 'CloudFront', 'EBS', 'RDS', '2025-07-02 11:40:13'),
(4, 'Which AWS service allows you to run code in response to events without provisioning or managing serv', 'S3', 'EC2', 'Lambda', 'Redshift', 'Lambda', '2025-07-02 11:40:13'),
(5, 'Which AWS service offers a fully managed NoSQL database service that provides fast and predictable p', 'Aurora', 'DynamoDB', 'Elastic Beanstalk', 'Route 53', 'DynamoDB', '2025-07-02 11:40:13'),
(6, 'Which AWS service is primarily used for object storage, allowing users to store and retrieve any amo', 'Amazon EC2', 'Amazon S3', ' Amazon RDS', 'AWS Lambda', 'Amazon S3', '2025-07-02 15:33:22'),
(7, 'Which AWS service is used for object storage?', 'EC2', 'S3', 'RDS', 'Lambda', 'S3', '2025-07-02 16:41:12'),
(8, 'Which database is managed by AWS?', 'MySQL', 'Oracle', 'PostgreSQL', 'All of the above', 'All of the above', '2025-07-02 16:41:12'),
(9, 'What is the AWS service for serverless computing?', 'EC2', 'Lambda', 'EBS', 'SNS', 'Lambda', '2025-07-02 16:41:12'),
(10, 'AWS IAM stands for?', 'Identity and Access Management', 'Internet Access Management', 'Infrastructure Access Module', 'Internal Audit Management', 'Identity and Access Management', '2025-07-02 16:41:12'),
(11, 'Which service is used for CDN in AWS?', 'SNS', 'Route53', 'CloudFront', 'CloudWatch', 'CloudFront', '2025-07-02 16:41:12'),
(12, 'Which AWS service provides monitoring?', 'CloudWatch', 'S3', 'EC2', 'VPC', 'CloudWatch', '2025-07-02 16:41:12'),
(13, 'Which AWS service stores structured data?', 'S3', 'EC2', 'RDS', 'SNS', 'RDS', '2025-07-02 16:41:12'),
(14, 'AWS service for message queuing?', 'SQS', 'SNS', 'SES', 'DynamoDB', 'SQS', '2025-07-02 16:41:12'),
(15, 'Service for notifications in AWS?', 'SES', 'SNS', 'CloudFront', 'S3', 'SNS', '2025-07-02 16:41:12'),
(16, 'Which service provides managed Kubernetes?', 'CloudFormation', 'EKS', 'EC2', 'RDS', 'EKS', '2025-07-02 16:41:12'),
(17, 'Which AWS service provides virtual machines?', 'EC2', 'S3', 'RDS', 'DynamoDB', 'EC2', '2025-07-02 16:41:12'),
(18, 'Which AWS service provides NoSQL database?', 'RDS', 'S3', 'EC2', 'DynamoDB', 'DynamoDB', '2025-07-02 16:41:12'),
(19, 'Which AWS service automates infrastructure deployment?', 'EC2', 'CloudFormation', 'Lambda', 'SNS', 'CloudFormation', '2025-07-02 16:41:12'),
(20, 'Which service provides relational database?', 'S3', 'DynamoDB', 'RDS', 'Lambda', 'RDS', '2025-07-02 16:41:12'),
(21, 'AWS VPC stands for?', 'Virtual Private Cloud', 'Virtual Public Cloud', 'Verified Private Connection', 'Virtual Processing Cloud', 'Virtual Private Cloud', '2025-07-02 16:41:12'),
(22, 'What service manages secrets?', 'Secrets Manager', 'SNS', 'EC2', 'CloudWatch', 'Secrets Manager', '2025-07-02 16:41:12'),
(23, 'Which service is used for file storage over NFS?', 'EFS', 'S3', 'RDS', 'EC2', 'EFS', '2025-07-02 16:41:12'),
(24, 'Which AWS service sends emails?', 'SNS', 'SES', 'SQS', 'EBS', 'SES', '2025-07-02 16:41:12'),
(25, 'Which service provides load balancing?', 'EC2', 'Route53', 'ELB', 'SNS', 'ELB', '2025-07-02 16:41:12'),
(26, 'Which service manages API gateways?', 'SNS', 'S3', 'API Gateway', 'RDS', 'API Gateway', '2025-07-02 16:41:12'),
(27, 'Which AWS service detects security threats?', 'CloudTrail', 'GuardDuty', 'S3', 'VPC', 'GuardDuty', '2025-07-02 16:41:12'),
(28, 'Service to store logs centrally?', 'CloudTrail', 'CloudWatch Logs', 'SNS', 'EC2', 'CloudWatch Logs', '2025-07-02 16:41:12'),
(29, 'Which service scans code for security flaws?', 'CodeBuild', 'CodeDeploy', 'Inspector', 'CodeGuru', 'Inspector', '2025-07-02 16:41:12'),
(30, 'Which service stores data in key-value pairs?', 'RDS', 'EBS', 'DynamoDB', 'SNS', 'DynamoDB', '2025-07-02 16:41:12'),
(31, 'Service to deploy containers without servers?', 'EKS', 'EC2', 'Fargate', 'CloudFront', 'Fargate', '2025-07-02 16:41:12'),
(32, 'Service for on-demand video streaming?', 'Elastic Transcoder', 'CloudFront', 'MediaConvert', 'SNS', 'MediaConvert', '2025-07-02 16:41:12'),
(33, 'Which service replicates data across regions?', 'S3 Cross-Region Replication', 'VPC', 'EC2', 'CloudTrail', 'S3 Cross-Region Replication', '2025-07-02 16:41:12'),
(34, 'Which service provides real-time analytics?', 'Kinesis', 'SNS', 'SES', 'EBS', 'Kinesis', '2025-07-02 16:41:12'),
(35, 'AWS tool for cost estimation?', 'Cost Explorer', 'SNS', 'S3', 'RDS', 'Cost Explorer', '2025-07-02 16:41:12'),
(36, 'Which service manages identities outside AWS?', 'IAM', 'Cognito', 'CloudTrail', 'SNS', 'Cognito', '2025-07-02 16:41:12'),
(37, 'Which service helps migrate databases?', 'Database Migration Service', 'CloudWatch', 'Lambda', 'SNS', 'Database Migration Service', '2025-07-02 16:41:12'),
(38, 'AWS CLI is?', 'Web console', 'Mobile app', 'Command Line Tool', 'Server', 'Command Line Tool', '2025-07-02 16:41:12'),
(39, 'Which service is for document search?', 'CloudFront', 'CloudSearch', 'RDS', 'SNS', 'CloudSearch', '2025-07-02 16:41:12'),
(40, 'AWS Macie discovers?', 'EC2 usage', 'Sensitive data', 'Lambda invocations', 'SNS topics', 'Sensitive data', '2025-07-02 16:41:12'),
(41, 'Which service is used for creating data lakes?', 'Athena', 'Glue', 'Lake Formation', 'CloudFront', 'Lake Formation', '2025-07-02 16:41:12'),
(42, 'Which service offers Windows virtual desktops?', 'EC2', 'WorkSpaces', 'RDS', 'SNS', 'WorkSpaces', '2025-07-02 16:41:12'),
(43, 'Service to archive data?', 'Glacier', 'S3', 'SNS', 'Lambda', 'Glacier', '2025-07-02 16:41:12'),
(44, 'Service for machine learning models?', 'SageMaker', 'EC2', 'EBS', 'SNS', 'SageMaker', '2025-07-02 16:41:12'),
(45, 'Which service offers object lock?', 'EC2', 'S3', 'RDS', 'SNS', 'S3', '2025-07-02 16:41:12'),
(46, 'AWS Step Functions are for?', 'Monitoring', 'Orchestration', 'Storage', 'Networking', 'Orchestration', '2025-07-02 16:41:12'),
(47, 'AWS WAF protects?', 'Emails', 'Web applications', 'Databases', 'S3 Buckets', 'Web applications', '2025-07-02 16:41:12'),
(48, 'Which service enables hybrid storage?', 'EFS', 'S3', 'Storage Gateway', 'RDS', 'Storage Gateway', '2025-07-02 16:41:12'),
(49, 'AWS Artifact is for?', 'Logging', 'Compliance reports', 'Compute', 'Storage', 'Compliance reports', '2025-07-02 16:41:12'),
(50, 'Which service triggers code automatically?', 'SNS', 'EC2', 'Lambda', 'S3', 'Lambda', '2025-07-02 16:41:12'),
(51, 'Which service offers private connectivity to AWS?', 'Direct Connect', 'CloudFront', 'SNS', 'SES', 'Direct Connect', '2025-07-02 16:41:12'),
(52, 'Which service provides automated patching?', 'Inspector', 'Systems Manager', 'CloudFront', 'SNS', 'Systems Manager', '2025-07-02 16:41:12'),
(53, 'AWS Budgets help?', 'Cost optimization', 'Deployment', 'Storage', 'Networking', 'Cost optimization', '2025-07-02 16:41:12'),
(54, 'Which AWS service provides alerts for cloud costs?', 'SNS', 'CloudTrail', 'Budgets', 'EC2', 'Budgets', '2025-07-02 16:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `azure_questions`
--

CREATE TABLE `azure_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `azure_questions`
--

INSERT INTO `azure_questions` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `created_at`) VALUES
(1, 'Which Azure service is used for storing large amounts of unstructured data, such as images, videos, ', 'Storage', 'Compute', 'AI', 'Networking', 'Storage', '2025-07-02 11:39:10'),
(2, 'In Azure, what resource would you create to deploy a virtual machine?', 'Networking', 'Compute', 'Storage', 'Security', 'Compute', '2025-07-02 11:39:10'),
(3, 'Which Azure service provides a fully managed relational database system?', 'Analytics', 'Database', 'Compute', 'Storage', 'Database', '2025-07-02 11:39:10'),
(4, 'Which Azure service allows you to run small pieces of code in response to events, without managing s', 'Security', 'Compute', 'Monitoring', 'AI', 'Compute', '2025-07-02 11:39:10'),
(5, 'Which globally distributed, multi-model database service does Azure offer?', 'Networking', 'Database', 'Compute', 'Storage', 'Database', '2025-07-02 11:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `gcloud_questions`
--

CREATE TABLE `gcloud_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gcloud_questions`
--

INSERT INTO `gcloud_questions` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `created_at`) VALUES
(1, 'BigQuery', 'Compute', 'AI', 'Analytics', 'Storage', 'Analytics', '2025-07-02 11:37:13'),
(2, 'AppEngine', 'Storage', 'Compute', 'AI', 'Monitoring', 'Compute', '2025-07-02 11:37:13'),
(3, 'Firestore', 'Compute', 'Database', 'Networking', 'Analytics', 'Database', '2025-07-02 11:37:13'),
(4, 'CloudRun', 'Networking', 'Compute', 'Storage', 'AI', 'Compute', '2025-07-02 11:37:13'),
(5, 'GKE', 'Compute', 'Container', 'Networking', 'Storage', 'Container', '2025-07-02 11:37:13'),
(6, 'Which AWS service is primarily used for object storage, allowing users to store and retrieve any amo', 'Amazon EC2', 'Amazon S3', ' Amazon RDS', 'AWS Lambda', 'Amazon S3', '2025-07-02 15:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `java_questions`
--

CREATE TABLE `java_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `java_questions`
--

INSERT INTO `java_questions` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `created_at`) VALUES
(1, 'JVM', 'Interpreter', 'Compiler', 'Virtual Machine', 'Debugger', 'Virtual Machine', '2025-07-02 11:36:41'),
(2, 'JDK', 'Editor', 'Library', 'Development Kit', 'Framework', 'Development Kit', '2025-07-02 11:36:41'),
(3, 'Servlet', 'UI', 'Thread', 'Web Component', 'Exception', 'Web Component', '2025-07-02 11:36:41'),
(4, 'Spring', 'Framework', 'Compiler', 'Debugger', 'Server', 'Framework', '2025-07-02 11:36:41'),
(5, 'Hibernate', 'ORM', 'Logger', 'Thread', 'Library', 'ORM', '2025-07-02 11:36:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `aws_questions`
--
ALTER TABLE `aws_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `azure_questions`
--
ALTER TABLE `azure_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gcloud_questions`
--
ALTER TABLE `gcloud_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `java_questions`
--
ALTER TABLE `java_questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aws_questions`
--
ALTER TABLE `aws_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `azure_questions`
--
ALTER TABLE `azure_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gcloud_questions`
--
ALTER TABLE `gcloud_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `java_questions`
--
ALTER TABLE `java_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
