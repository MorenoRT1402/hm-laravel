# Stop MySQL
echo "Deteniendo MySQL..."
sudo systemctl stop mysql
if [ $? -eq 0 ]; then
    echo "MySQL detenido correctamente."
else
    echo "Error al detener MySQL o el servicio ya estaba detenido."
fi

# Stop Apache2
echo "Deteniendo Apache2..."
sudo systemctl stop apache2
if [ $? -eq 0 ]; then
    echo "Apache2 detenido correctamente."
else
    echo "Error al detener Apache2 o el servicio ya estaba detenido."
fi

# Init Sail
echo "Iniciando Sail..."
./vendor/bin/sail up -d
if [ $? -eq 0 ]; then
    echo "Sail iniciado correctamente en modo desacoplado."
else
    echo "Error al iniciar Sail."
fi
