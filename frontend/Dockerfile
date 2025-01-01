# Start with Node.js base image
FROM node:18-alpine

WORKDIR /app/frontend
COPY . . 
RUN npm install
RUN npm run build
# Expose the port for Next.js
EXPOSE 3000