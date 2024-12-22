import json

# Ruta del archivo JSON original y del archivo filtrado
input_file = "countries+states+cities.json"
output_file = "colombia_states_cities.json"

def extract_colombia(input_file, output_file):
    try:
        with open(input_file, "r", encoding="utf-8") as file:
            data = json.load(file)
        
        # Filtrar solo el país 'Colombia'
        colombia_data = next((country for country in data if country.get("name") == "Colombia"), None)

        if not colombia_data:
            print("No se encontró la información de Colombia en el archivo.")
            return
        
        # Crear un nuevo JSON solo con la información de Colombia
        with open(output_file, "w", encoding="utf-8") as file:
            json.dump([colombia_data], file, indent=4, ensure_ascii=False)
        
        print(f"Archivo de Colombia generado en: {output_file}")

    except Exception as e:
        print(f"Error procesando el archivo: {e}")

# Ejecutar la función
extract_colombia(input_file, output_file)
