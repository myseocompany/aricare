import json

# Ruta del archivo JSON original y del archivo procesado
input_file = "countries+states+cities.json"
output_file = "processed_countries.json"

def process_json(input_file, output_file):
    try:
        with open(input_file, "r", encoding="utf-8") as file:
            data = json.load(file)

        # Procesar países, estados y ciudades
        processed_data = []
        for country in data:
            processed_country = {
                "name": country.get("name"),
                "iso2": country.get("iso2"),
                "iso3": country.get("iso3"),
                "states": []
            }

            # Procesar estados (si existen)
            for state in country.get("states", []):
                processed_state = {
                    "name": state.get("name"),
                    "state_code": state.get("state_code"),
                    "cities": []
                }

                # Procesar ciudades (si existen)
                for city in state.get("cities", []):
                    processed_city = {
                        "name": city.get("name")
                    }
                    processed_state["cities"].append(processed_city)

                processed_country["states"].append(processed_state)

            processed_data.append(processed_country)

        # Guardar el JSON procesado
        with open(output_file, "w", encoding="utf-8") as file:
            json.dump(processed_data, file, indent=4, ensure_ascii=False)

        print(f"Archivo procesado guardado en: {output_file}")

    except Exception as e:
        print(f"Error procesando el archivo: {e}")

# Ejecutar la función
process_json(input_file, output_file)
