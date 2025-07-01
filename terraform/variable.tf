variable "key_name" {
  description = "EC2 key pair name"
  type        = string
  default     = "gurunanak"  # ✅ Not the .pem file, just the key name in AWS
}
