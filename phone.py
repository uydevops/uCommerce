import subprocess

def get_device_info():
    devices_output = subprocess.check_output(['adb', 'devices']).decode('utf-8')
    if 'device' not in devices_output.split('\n')[1]:
        print("Cihaz bağlı değil.")
        return
    
    device_info = {}
    
    android_version = subprocess.check_output(['adb', 'shell', 'getprop', 'ro.build.version.release']).decode('utf-8').strip()
    device_info['Android Version'] = android_version
    
    manufacturer = subprocess.check_output(['adb', 'shell', 'getprop', 'ro.product.manufacturer']).decode('utf-8').strip()
    model = subprocess.check_output(['adb', 'shell', 'getprop', 'ro.product.model']).decode('utf-8').strip()
    device_info['Manufacturer'] = manufacturer
    device_info['Model'] = model
    
    serial_number = subprocess.check_output(['adb', 'shell', 'getprop', 'ro.serialno']).decode('utf-8').strip()
    device_info['Serial Number'] = serial_number
    
    # IP adresi
    ip_address = subprocess.check_output(['adb', 'shell', 'ip', 'addr', 'show', 'wlan0']).decode('utf-8')
    device_info['IP Address'] = ip_address
    
    # MAC adresi
    mac_address = subprocess.check_output(['adb', 'shell', 'cat', '/sys/class/net/wlan0/address']).decode('utf-8').strip()
    device_info['MAC Address'] = mac_address
    
    return device_info

device_info = get_device_info()
if device_info:
    for key, value in device_info.items():
        print(f"{key}: {value}")
