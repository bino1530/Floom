import qrcode
from PIL import Image

def generate_qr(data, filename="qrcode_colored.png", fill_color="white", back_color="#1e2934"):
    qr = qrcode.QRCode(
        version=1,
        error_correction=qrcode.constants.ERROR_CORRECT_H,  # Tăng khả năng phục hồi lỗi
        box_size=10,
        border=4,
    )
    qr.add_data(data)
    qr.make(fit=True)

    img = qr.make_image(fill_color=fill_color, back_color=back_color)
    img.save(filename)
    print(f"QR Code saved as {filename}")

# Example usage
data = "http://floomm.rf.gd"
generate_qr(data, fill_color="white", back_color="#1e2934")
