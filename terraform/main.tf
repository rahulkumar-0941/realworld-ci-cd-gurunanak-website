# Security Group
resource "aws_security_group" "web_sg" {
  name        = "gurunanak-sg"
  description = "Allow ports 22, 80, 443"
  vpc_id      = "vpc-0ff761152fa68d9f2"  # your VPC ID

  ingress {
    from_port   = 22
    to_port     = 22
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    from_port   = 80
    to_port     = 80
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    from_port   = 443
    to_port     = 443
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    from_port   = 8080
    to_port     = 8080
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  egress {
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }
}

# EC2 Instance
resource "aws_instance" "web_server" {
  ami                         = "ami-0f9cb75652314425a"          # your ami ID
  instance_type               = "t2.micro"
  key_name                    = var.key_name
  subnet_id                   = "subnet-0dfff694097e82865"        # your Subnet ID
  vpc_security_group_ids      = [aws_security_group.web_sg.id]
  associate_public_ip_address = true

  tags = {
    Name = "gurunanak-server"
  }
}
