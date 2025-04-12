# Use the official Nginx image
FROM nginx:alpine

# Copy your website files into the default Nginx public folder
COPY . /usr/share/nginx/html

# Expose port 80
EXPOSE 80
